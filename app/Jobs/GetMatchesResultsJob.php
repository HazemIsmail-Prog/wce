<?php

namespace App\Jobs;

use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetMatchesResultsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('Schedule Started');
        // $this->getMatches();
        Log::info('Schedule Finished');
    }

    public function getToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('http://api.cup2022.ir/api/v1/user/login', [
            "email" => "hazem.ismail@hotmail.com",
            "password" => "H@zem99589018",
        ]);
        $token = $response['data']['token'];
        return $token;
    }

    public function getMatches()
    {
        $response = Http::withToken($this->getToken())->get('http://api.cup2022.ir/api/v1/match');
        $matches = $response->json()['data'];
        foreach ($matches as $match) {

            if ($match['finished'] == 'TRUE') {

                $game = Game::query()
                    ->where('team1_score' ,null)
                    ->where('team2_score' ,null)
                    ->whereHas('team1', function ($q) use ($match) {
                        $q->where('name', $match['home_team_en']);
                        $q->orWhere('name', $match['away_team_en']);
                    })
                    ->whereHas('team2', function ($q) use ($match) {
                        $q->where('name', $match['home_team_en']);
                        $q->orWhere('name', $match['away_team_en']);
                    })
                    ->first();
                if ($game) {
                    $game->update([
                        'team1_score' => $game->team1->name == $match['home_team_en'] ? $match['home_score'] : $match['away_score'],
                        'team2_score' => $game->team2->name == $match['home_team_en'] ? $match['home_score'] : $match['away_score'],
                    ]);
                }
            }
        }
        Log::info('Api Get Results Done');
    }
}
