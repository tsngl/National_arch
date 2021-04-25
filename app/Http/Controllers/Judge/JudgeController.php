<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participate;

class JudgeController extends Controller
{
    public function viewathletes(){
        $participant = Participate::all();
        return view('judge.dashboard')->with('participant', $participant);
    }

    public function scoreboard(){

        return view('judge.scoreboard');
    }
}
