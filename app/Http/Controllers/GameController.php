<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with(['team1','team2'])->get();
        return view('games' ,compact('games'));
    }

    public function save(Request $request, Game $game)
    {
        $this->validate($request, [
            'team1_score' => ['required', 'numeric', 'min:0'],
            'team2_score' => ['required', 'numeric', 'min:0'],
        ]);
        
        $game->update(
            [
                'team1_score' => $request->team1_score,
                'team2_score' => $request->team2_score,
                'team1_p_score' => $request->team1_p_score,
                'team2_p_score' => $request->team2_p_score,
            ]
        );

        return redirect()->back();
    }
}
