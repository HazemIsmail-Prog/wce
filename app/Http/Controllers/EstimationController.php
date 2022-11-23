<?php

namespace App\Http\Controllers;

use App\Models\Estimation;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstimationController extends Controller
{
    public function store(Request $request, Game $game)
    {
        $validator = Validator::make($request->all(), [
            'team1_score' => ['required', 'numeric', 'min:0'],
            'team2_score' => ['required', 'numeric', 'min:0'],
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

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
