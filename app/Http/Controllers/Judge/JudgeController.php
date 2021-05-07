<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participate;
use App\Models\Athletes;
use App\Models\Competition;
use Illuminate\Support\Facades\DB;

class JudgeController extends Controller
{
    public function viewathletes(){
        $comp = Competition::all();
        $athletes= DB::table('athletes')
                ->join('athletes_competition','athletes_competition.athletes_id','=','athletes.id')
                ->where('athletes_competition.competition_id', 1)
                ->get();
        return view('judge.dashboard', compact('athletes', 'comp'));
    }

    public function scoreboard(){

        return view('judge.scoreboard');
    }
}
