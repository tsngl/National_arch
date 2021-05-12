<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participate;
use App\Models\Athletes;
use App\Models\Skill;
use App\Models\Competition;
use App\Models\Athletes_Competition;
use Illuminate\Support\Facades\DB;

class JudgeController extends Controller
{
    public function competition(){
        $competition = Competition::all();
        return view('judge.choose-competition')->with('competition', $competition);
    }
    public function choosedCompetitionAthletes(Request $request, $id){
        $comp = Competition::all();
        $comp_id = Competition::findOrFail($id); 
        $id = $comp_id->id;
        $athletes= DB::table('athletes')
                ->join('athletes_competition','athletes_competition.athletes_id','=','athletes.id')
                ->join('skill', 'skill.id', '=' , 'athletes.skill_id')
                ->where('athletes_competition.competition_id', $id)
                ->orderByRaw('rank_hierarchy DESC')
                ->get();
            foreach($athletes as $athlete){
                $participant = new Participate;
                $participant->last_name = $athlete->last_name;
                $participant->first_name = $athlete->first_name;
                $participant->gender = $athlete->gender;
                $participant->skill = $athlete->skill;
                $participant->skill_id = $athlete->skill_id;
                $participant->undsen_zahirgaa = $athlete->undsen_zahirgaa;
                $participant->club = $athlete->club;
                $participant->phone = $athlete->phone;
                $participant->athletes_id = $athlete->athletes_id;
                $participant->competition_id = $athlete->competition_id;
                $participant->rank_hierarchy = $athlete->rank_hierarchy;
                $participant->save();                  
                    }
         //return $this->scoreboard($id);  
        return redirect('/choose-competition'); 

       //return redirect(route('judge',$comp->id));
    }   

    public function participantDeleteAll(Request $request){
        $ids = $request->ids;
        Participate::whereIn('id',$ids)->delete();
        return response()->json(['status'=>'Тамирчны мэдээллийг бүртгэлээс устгалаа']);
    }

    public function viewathletes(){
        $comp = Competition::all();
        $participant = Participate::all();
        return view('judge.dashboard', compact('participant', 'comp'));
     }

    public function scoreboard(){
        $maleAthletes= DB::table('participate')
                ->where('gender', 'Эр')
                ->orderByRaw('rank_hierarchy DESC')
                ->get();

    return view('judge.scoreboardM')->with('maleAthletes', $maleAthletes);
    }

    public function boardFemale(){
        $femaleAthletes= DB::table('participate')
                ->where('gender', 'Эм')
                ->orderByRaw('rank_hierarchy DESC')
                ->get();
                
     return view('judge.scoreboardF')->with('femaleAthletes', $femaleAthletes);
    }

    public function updateScoreMale(Request $request, $id){
        $skill_table_id = Participate::find($id);
        $skill_table_id->score = $skill_table_id->score + $request->input('score');
        $skill_table_id->update();

        $pivot_table_score = DB::table('athletes_competition')
                    ->where('athletes_id' ,  $skill_table_id->athletes_id)
                    ->where('competition_id' ,  $skill_table_id->competition_id)
                    ->get();
                    //dd($pivot_table_score);
        foreach($pivot_table_score as $score){
            $ss = Athletes_Competition::find($score->id);
            $ss->score = $skill_table_id->score;
            $ss->update();

        }
        return redirect('/scoreboard');
    }

    public function updateScoreFemale(Request $request, $id){
        $skill_table_id = Participate::find($id);
        $skill_table_id->score = $skill_table_id->score + $request->input('score');
        $skill_table_id->update();

        $pivot_table_score = DB::table('athletes_competition')
                            ->where('athletes_id' ,  $skill_table_id->athletes_id)
                            ->where('competition_id' ,  $skill_table_id->competition_id)
                            ->get();
            foreach($pivot_table_score as $score){
            $ss = Athletes_Competition::find($score->id);
            $ss->score = $skill_table_id->score;
            $ss->update();

            }

        return redirect('/boardFemale');
    }

}
