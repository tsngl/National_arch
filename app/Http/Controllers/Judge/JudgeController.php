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
use PDF;

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
        $competition = Participate::all();
            foreach($competition as $comp){
                    $comp_id = $comp->competition_id;
                }
            $competition_name = Competition::find($comp_id);
            $comp_name = $competition_name->competition_name;

    return view('judge.scoreboardM')->with('maleAthletes', $maleAthletes)->with('comp_name',$comp_name);
    }

    public function boardFemale(){
        $femaleAthletes= DB::table('participate')
                ->where('gender', 'Эм')
                ->orderByRaw('rank_hierarchy DESC')
                ->get();
        $competition = Participate::all();
            foreach($competition as $comp){
                    $comp_id = $comp->competition_id;
                }
            $competition_name = Competition::find($comp_id);
            $comp_name = $competition_name->competition_name;
                
     return view('judge.scoreboardF')->with('femaleAthletes', $femaleAthletes)->with('comp_name',$comp_name);
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

    public function competitionProcess(){
        $male = DB::table('participate')
                    ->where('gender' , 'Эр')
                    ->orderByRaw('score DESC')
                    ->get();
        $female = DB::table('participate')
                    ->where('gender' , 'Эм')
                    ->orderByRaw('score DESC')
                    ->get();
        return view('judge.process', compact('male','female'));
    }

    public function reportFemale(){
        $femaleAthletes= DB::table('participate')
                ->where('gender', 'Эм')
                ->orderByRaw('score DESC')
                ->get();
     return $femaleAthletes;
    }

    public function competitionName(){
        $competition = Participate::all();
        foreach($competition as $comp){
            $comp_id = $comp->competition_id;
        }
        $competition_name = Competition::find($comp_id);
        $comp_name = $competition_name->competition_name;
        return $comp_name;
    }

    public function pdf(){
        $pdf = PDF::loadHTML($this->convert_report_data_to_html());
        return $pdf->stream();
    }

    public function convert_report_data_to_html(){
        $data = $this->reportFemale();
        $competition_name = $this->competitionName();
        foreach($data as $created){
            $created_at = $created->created_at;
        }
        $output = '
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <style>
            body {
                font-family:   DejaVu Sans;
            }
            </style>
        <body>
        <p align="center">МОНГОЛЫН ҮНДЭСНИЙ СУР ХАРВАА</p>
        <p align="center"><b>'.$competition_name.'</b><br>/Эмэгтэй тамирчид/</p><br>
        <p align="left">'.$created_at.'</p>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
         <tr>
       <th style="border: 1px solid; padding:12px;" width="15%">Овог</th>
       <th style="border: 1px solid; padding:12px;" width="18%">Нэр</th>
       <th style="border: 1px solid; padding:12px;" width="30%">Цол</th>
       <th style="border: 1px solid; padding:12px;" width="25%">Харъяа</th>
       <th style="border: 1px solid; padding:12px;" width="5%">Оноо</th>
      </tr>';
              foreach($data as $female){
                $output .= '<tr>
                <td style="border: 1px solid; padding:5px;">'.$female->last_name.'</td>
                <td style="border: 1px solid; padding:5px;">'.$female->first_name.'</td>
                <td style="border: 1px solid; padding:5px;">'.$female->skill.'</td>
                <td style="border: 1px solid; padding:5px;">'.$female->club.'</td>
                <td style="border: 1px solid; padding:5px;">'.$female->score.'</td>
               </tr>';
                }

                $output .= '</table>
                <p style="text-align:center">Ерөнхий шүүгч................/Х.Хүрэлбаатар/</p>
                <p style="text-align:center">Зурхайн шүүгч.................../Б.Бурмаа/</p>
                <p style="text-align:center">Самбарын шүүгч................../С.Даваахүү/</p>
                </body>';
                return $output;
    }

    public function reportMale(){
        $maleAthletes= DB::table('participate')
                ->where('gender', 'Эр')
                ->orderByRaw('score DESC')
                ->get();
     return $maleAthletes;
    }

    public function pdfmale(){
        $pdf = PDF::loadHTML($this->convert_report_male_to_html());
        return $pdf->stream();
    }

    public function convert_report_male_to_html(){
        $data = $this->reportMale();
        $competition_name = $this->competitionName();
        foreach($data as $created){
            $created_at = $created->created_at;
        }
        $output = '
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        </head>
        <style>
            body {
                font-family:   DejaVu Sans;
            }
            </style>
        <body>
        <p align="center">МОНГОЛЫН ҮНДЭСНИЙ СУР ХАРВАА</p>
        <p align="center"><b>'.$competition_name.'</b><br>/Эрэгтэй тамирчид/</p><br>
        <p align="left">'.$created_at.'</p>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
         <tr>
       <th style="border: 1px solid; padding:12px;" width="15%">Овог</th>
       <th style="border: 1px solid; padding:12px;" width="15%">Нэр</th>
       <th style="border: 1px solid; padding:12px;" width="25%">Цол</th>
       <th style="border: 1px solid; padding:12px;" width="15%">Харъяа</th>
       <th style="border: 1px solid; padding:12px;" width="5%">Оноо</th>
      </tr>';
              foreach($data as $male){
                $output .= '<tr>
                <td style="border: 1px solid; padding:5px;">'.$male->last_name.'</td>
                <td style="border: 1px solid; padding:5px;">'.$male->first_name.'</td>
                <td style="border: 1px solid; padding:5px;">'.$male->skill.'</td>
                <td style="border: 1px solid; padding:5px;">'.$male->club.'</td>
                <td style="border: 1px solid; padding:5px;">'.$male->score.'</td>
               </tr>';
                }

                $output .= '</table>
                <p style="text-align:center">Ерөнхий шүүгч................/Х.Хүрэлбаатар/</p>
                <p style="text-align:center">Зурхайн шүүгч.................../Б.Бурмаа/</p>
                <p style="text-align:center">Самбарын шүүгч................../С.Даваахүү/</p>
                </body>';
                return $output;
    }

}
