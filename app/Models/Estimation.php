<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function getScoreAttribute()
    {

        // Game not Finished yet
        if (!$this->game->is_played) {
            return 0;
        }

        //Exact Estimation
        if (
            $this->game->team1_score == $this->team1_score
            &&
            $this->game->team2_score == $this->team2_score
        ) {
            return 4;
        }

        // Same Goals Difference or Draw
        if (
            $this->game->team1_score - $this->game->team2_score
            ==
            $this->team1_score - $this->team2_score
        ) {
            return 2;
        }

        // Team 1 Wins Or Team 2 Wins
        if (
            ($this->game->team1_score > $this->game->team2_score && $this->team1_score > $this->team2_score)
            ||
            ($this->game->team1_score < $this->game->team2_score && $this->team1_score < $this->team2_score)
        ) {
            return 1;
        }

        // return 0 if non of above options
        return 0;
    }
}
