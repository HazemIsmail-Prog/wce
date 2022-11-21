<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::query()
            // ->where('date_time','>',now()->addMinutes(15))
            ->with(['team1','team2','estimations.user','estimations.game'])
            ->get();
        return view('home',compact('games'));
    }
}
