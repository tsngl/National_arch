<?php

namespace App\Http\Controllers\Assistant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Athletes;
use App\Models\Participate;
use App\Models\AthleteArchive;
use App\Models\Skill;
use App\Models\Competition;
use Session;
use Illuminate\Support\Facades\DB;
use PDF;

class AthletesController extends Controller
{
    public function athlete(){
        $athletes = Athletes::all();
        $athletes = DB::table('athletes')->paginate(10);
        $comp = DB::table('competition')->where('status', '1')->get();
        return view('assistant.dashboard', compact('athletes', 'comp'));
    }
    public function athletesinfo(){
        $athletes = Athletes::all();
        $athletes = DB::table('athletes')->paginate(10);
        return view('assistant.athletes-info')->with('athletes', $athletes);
    }
    public function athletesadd(){
        return view('assistant.new-athletes');
    }
    public function store(Request $request){
        $skill = DB::table('skill')->where('skill', $request->input('skill'))->pluck('id');
        //dd($skill[0]);
        $newAthlete = new Athletes;
        $newAthlete->last_name = $request->input('last_name');
        $newAthlete->first_name = $request->input('first_name');
        $newAthlete->gender = $request->input('gender');
        $newAthlete->skill = $request->input('skill');
        $newAthlete->skill_id = $skill[0];
        $newAthlete->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $newAthlete->club = $request->input('club');
        $newAthlete->phone = $request->input('phone');
        $newAthlete->save();

        Session::flash('statuscode','success');
        return redirect('/athletes-info')->with('status','Амжилттай бүртгэгдлээ');

    }
    public function athletesedit(Request $request, $id){
        $athletes = Athletes::findOrFail($id);
        return view('assistant.athletes-edit')->with('athletes', $athletes);
    }
    public function athletesupdate(Request $request, $id){
        $athletes = Athletes::find($id);
        $athletes->last_name = $request->input('last_name');
        $athletes->first_name = $request->input('first_name');
        $athletes->gender = $request->input('gender');
        $athletes->skill = $request->input('skill');
        $athletes->undsen_zahirgaa = $request->input('undsen_zahirgaa');
        $athletes->club = $request->input('club');
        $athletes->phone = $request->input('phone');
        $athletes->update();

        Session::flash('statuscode','info');
        return redirect('/athletes-info')->with('status','Амжилттай шинэчиллээ');

    }
    public function athletesdelete($id){
        $athletes = Athletes::findOrFail($id);

        $archived = new AthleteArchive;
        $archived->last_name = $athletes->last_name;
        $archived->first_name = $athletes->first_name;
        $archived->gender = $athletes->gender;
        $archived->skill = $athletes->skill;
        $archived->undsen_zahirgaa = $athletes->undsen_zahirgaa;
        $archived->club = $athletes->club;
        $archived->phone = $athletes->phone;
        $archived->skill_id = $athletes->skill_id;
        $archived->save();

        $athletes->delete();
        return response()->json(['status'=>'Тамирчны мэдээллийг бүртгэлээс устгалаа']);
    }

    public function archive(){
        $archived = AthleteArchive::all();
        return view('assistant.archived-athlete')->with('archived',$archived);
    }

    public function restore($id){
        $archive = AthleteArchive::findOrFail($id);

        $athlete = new Athletes;
        $athlete->last_name = $archive->last_name;
        $athlete->first_name = $archive->first_name;
        $athlete->gender = $archive->gender;
        $athlete->skill = $archive->skill;
        $athlete->undsen_zahirgaa = $archive->undsen_zahirgaa;
        $athlete->club = $archive->club;
        $athlete->phone = $archive->phone;
        $athlete->skill_id = $archive->skill_id;
        $athlete->save();

        $archive->delete();
        Session::flash('statuscode','success');
        return redirect('/athlete-archived')->with('status','Амжилттай сэргээгдлээ');
    }

    public function participate(Request $request){
        $checked_array = $request->id;
        
            foreach($request->id as $key => $value){
               
                $athlete = Athletes::where('id', $request->id[$key])->get();
                $competition = Competition::findOrFail($request->value[0]);
                $competition->athletes()->attach($athlete);
            
                // if(in_array($request->id[$key], $checked_array)){
                //     $participant = new Participate;
                //     $participant->last_name = $request->last_name[$key];
                //     $participant->first_name = $request->first_name[$key];
                //     $participant->gender = $request->gender[$key];
                //     $participant->skill = $request->skill[$key];
                //     $participant->club = $request->club[$key];
                //     $participant->save();
                // }
            }
            return response()->json(['status'=>'Сонгогдсон тамирчид тэмцээнд амжилттай бүртгэгдлээ']);
        }
    

   /* public function participantAthletes(){
        $participant = Participate::all();
        return view('assistant.participate-athletes')->with('participant', $participant);
    }*/

    /*public function participantDelete(Request $request){
        $ids = $request->ids;
        Participate::whereIn('id',$ids)->delete();
        return response()->json(['status'=>'Тамирчны мэдээллийг бүртгэлээс устгалаа']);
    } */

    public function search(){
        $search_text = $_GET['query'];
        $athletes = Athletes::where('first_name', 'LIKE', '%'.$search_text.'%')->get();
        
        return view('assistant.search',compact('athletes'));
    }

    public function athletesSearch(){
        $search_text = $_GET['query'];
        $athletes = Athletes::where('first_name', 'LIKE', '%'.$search_text.'%')->get();
        
        return view('assistant.athletes-search',compact('athletes'));
    }

    public function competition(){
        $comp = Competition::all();
        $comp = DB::table('competition')->paginate(5);
        return view('assistant.competition')->with('comp',$comp);
    }

    public function competitionsave(Request $request){
        $comp = new Competition;
        $comp->competition_name = $request->competition_name;
        $comp->rank = $request->rank;
        $comp->status = $request->status;
        $comp->save();

        return redirect('/competition');
    }

    public function competitionedit($id){
         $competition = Competition::findOrFail($id);
         return view('assistant.competition-edit')->with('competition', $competition);
    }

    public function competitionupdate(Request $request, $id){
        $comp = Competition::find($id);
        $comp->competition_name = $request->input('competition_name');
        $comp->rank = $request->input('rank');
        $comp->status = $request->input('status');
        $comp->update();

        return redirect('/competition');
    }

    public function competitionDetail(Request $request, $id){
        $comp = Competition::find($id);
        $count= DB::table('athletes')
                ->join('athletes_competition','athletes_competition.athletes_id','=','athletes.id')
                ->where('athletes_competition.competition_id', $comp->id)
                ->orderByRaw('score DESC')
                ->count();

               if($count != 0 ){
                        $athletes= DB::table('athletes')
                                ->join('athletes_competition','athletes_competition.athletes_id','=','athletes.id')
                                ->join('skill', 'skill.id', '=' , 'athletes.skill_id')
                                ->where('athletes_competition.competition_id', $comp->id)
                                ->orderByRaw('rank_hierarchy DESC')
                                ->get();
                                //dd($athletes);
                        return view('assistant.competition-detail', compact('athletes', 'comp'));
               }else{
                        Session::flash('statuscode','info');
                        return redirect('/competition')->with('status','Тэмцээнд бүртгэгдсэн тамирчин байхгүй байна');
               }
    }

    public function competitionStatus(Request $request, $id){
        $comp = Competition::findOrFail($id);

        if($comp->status == 1){
            $comp->status = 0;
            $comp->update();

        Session::flash('statuscode','success');
        return redirect('/competition')->with('status','Амжилттай устгалаа');
        }else{
            Session::flash('statuscode','info');
        return redirect('/competition')->with('status','Тэмцээн устгагдсан');
        }
    }

    public function newRank(){
        $participant_Athletes = Participate::all();
            foreach($participant_Athletes as $competition){
                $comp_id = $competition->competition_id;
            }  
        $competition_rank = Competition::find($comp_id);

        
            $promotion  = DB::table('participate')
                    ->where('rank_hierarchy', '<=' , 9 )
                    ->where('score', '>=' , 30)
                    ->get();
           
            return view('assistant.rankUp')->with('promotion', $promotion)->with('competition_rank',$competition_rank); 
        
        }    
}
