<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'score'
    ];

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

        if($this->game->team1_score == null && $this->game->team2_score == null)
        {
            return 0;
        }


        if($this->game->team1_score == $this->team1_score && $this->game->team2_score == $this->team2_score)
        {
            return 4;
        }
        if($this->game->team1_score - $this->game->team2_score == $this->team1_score - $this->team2_score)
        {
            return 2;
        }

        if(($this->game->team1_score > $this->game->team2_score && $this->team1_score > $this->team2_score) || ($this->game->team1_score < $this->game->team2_score && $this->team1_score < $this->team2_score)){
            return 1;
        }
        return 0;
    }

}
