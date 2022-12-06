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

    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_id');
    }

    public function getScoreAttribute()
    {

        $score = 0;

        // Game not Finished yet
        if ($this->game->is_played) {
            //Exact Estimation
            if (
                $this->game->team1_score == $this->team1_score
                &&
                $this->game->team2_score == $this->team2_score
            ) {
                $score = 4;
            }else{
                // Same Goals Difference or Draw
                if (
                    $this->game->team1_score - $this->game->team2_score
                    ==
                    $this->team1_score - $this->team2_score
                ) {
                    $score = 2;
                }else{
                    // Team 1 Wins Or Team 2 Wins
                    if (
                        ($this->game->team1_score > $this->game->team2_score && $this->team1_score > $this->team2_score)
                        ||
                        ($this->game->team1_score < $this->game->team2_score && $this->team1_score < $this->team2_score)
                    ) {
                        $score = 1;
                    }
                }
            }
        }



        // Penalties Calculation
        if (
            ($this->game->team1_p_score > $this->game->team2_p_score && $this->winner_id == $this->game->team1_id)
            ||
            ($this->game->team1_p_score < $this->game->team2_p_score && $this->winner_id == $this->game->team2_id)
        ) {
            $score = $score + 1;
        }

        return $score;
    }
}
