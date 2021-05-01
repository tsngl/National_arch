<?php

namespace App\Http\Controllers\Assistant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Athletes;
use App\Models\Participate;
use App\Models\AthleteArchive;
use Session;
use Illuminate\Support\Facades\DB;

class AthletesController extends Controller
{
    public function athlete(){
        $athletes = Athletes::all();
        $athletes = DB::table('athletes')->paginate(5);
        return view('assistant.dashboard')->with('athletes', $athletes);
    }
    public function athletesinfo(){
        $athletes = Athletes::all();
        $athletes = DB::table('athletes')->paginate(5);
        return view('assistant.athletes-info')->with('athletes', $athletes);
    }
    public function athletesadd(){
        return view('assistant.new-athletes');
    }
    public function store(Request $request){
        $newAthlete = new Athletes;
        $newAthlete->last_name = $request->input('last_name');
        $newAthlete->first_name = $request->input('first_name');
        $newAthlete->gender = $request->input('gender');
        $newAthlete->skill = $request->input('skill');
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
        $athlete->save();

        $archive->delete();
        Session::flash('statuscode','success');
        return redirect('/athlete-archived')->with('status','Амжилттай сэргээгдлээ');
    }

    public function participate(Request $request){
        $checked_array = $request->id;
        foreach($request->id as $key => $value){
            if(in_array($request->id[$key], $checked_array)){
                $participant = new Participate;
                $participant->last_name = $request->last_name[$key];
                $participant->first_name = $request->first_name[$key];
                $participant->gender = $request->gender[$key];
                $participant->skill = $request->skill[$key];
                $participant->club = $request->club[$key];
                $participant->save();
            }
        }

        return response()->json(['status'=>'Сонгогдсон тамирчид тэмцээнд амжилттай бүртгэгдлээ']);
       
    }

    public function participantAthletes(){
        $participant = Participate::all();
        return view('assistant.participate-athletes')->with('participant', $participant);
    }

    public function participantDelete(Request $request){
        $ids = $request->ids;
        Participate::whereIn('id',$ids)->delete();
        return response()->json(['status'=>'Тамирчны мэдээллийг бүртгэлээс устгалаа']);
    }

    public function search(){
        $search_text = $_GET['query'];
        $athletes = Athletes::where('first_name', 'LIKE', '%'.$search_text.'%')->get();
        
        return view('assistant.search',compact('athletes'));
    }
}
