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
        $athletes_id = DB::table('athletes_competition')->pluck('athletes_id');
        $participant = Athletes::find($athletes_id);
        
        return view('judge.dashboard')->with('participant', $participant);
    }

    public function scoreboard(){

        return view('judge.scoreboard');
    }
}
