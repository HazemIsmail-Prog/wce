<?php

namespace App\Http\Controllers;

use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::where('date_time','>',now()->addMinutes(15))->get();
        return view('home',compact('games'));
    }
}
