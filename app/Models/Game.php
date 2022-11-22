<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_time' => 'dateTime'
    ];

    protected $appends = [
        'is_played',
        'date',
        'time',
    ];


    public function team1()
    {
        return $this->belongsTo(Team::class,'team1_id');
    }
    public function team2()
    {
        return $this->belongsTo(Team::class,'team2_id');
    }
    public function estimations()
    {
        return $this->hasMany(Estimation::class);
    }

    public function getIsPlayedAttribute()
    {
        if($this->team1_score !== null && $this->team2_score !== null)
        {
            return 1;
        }
        return 0;
    }

    public function getDateAttribute()
    {
        return $this->date_time->format('D,  d-m-Y');
    }

    public function getTimeAttribute()
    {
        return $this->date_time->format('h:i a');
    }
}
