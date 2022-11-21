<?php

namespace App\Http\Controllers;

use App\Models\Estimation;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    public function store(Request $request, Game $game)
    {
        $this->validate($request, [
            'team1_score' => ['required', 'numeric', 'min:0'],
            'team2_score' => ['required', 'numeric', 'min:0'],
        ]);

        if ($game->date_time <= now()->addMinutes(15))
        {
            return redirect()->back();
        }

            Estimation::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'game_id' => $game->id,
                ],
                [
                    'team1_score' => $request->team1_score,
                    'team2_score' => $request->team2_score,
                ]
            );

        return redirect()->back();
    }
}
