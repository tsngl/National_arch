<?php

namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participate;
use Illuminate\Support\Facades\DB;

class JudgeController extends Controller
{
    public function viewathletes(){
        $participant = Participate::all();
        $participant = DB::table('participate')->paginate(5);
        return view('judge.dashboard')->with('participant', $participant);
    }

    public function scoreboard(){

        return view('judge.scoreboard');
    }
}
