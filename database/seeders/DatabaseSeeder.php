<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'name' => 'Hazem',
        //     'username' => 'hazem',
        //     'password' => bcrypt('123123123'),
        // ]);

        $users = [
            ['name' => 'Hazem',     'username' => 'hazem',     'password' => bcrypt('123456')],
            ['name' => 'Kareem',    'username' => 'kareem',    'password' => bcrypt('123456')],
            ['name' => 'Mostafa',   'username' => 'mostafa',   'password' => bcrypt('123456')],
            ['name' => 'Mo3taz',    'username' => 'mo3taz',    'password' => bcrypt('123456')],
            ['name' => 'Hamasa',    'username' => 'hamasa',    'password' => bcrypt('123456')],
            ['name' => 'Rostom',    'username' => 'rostom',    'password' => bcrypt('123456')],
            ['name' => 'Essam',     'username' => 'essam',     'password' => bcrypt('123456')],
        ];

        User::insert($users);




        $teams = [
            ['name' => 'Argentina',                'flag' => 'argentina.png'],
            ['name' => 'Australia',                'flag' => ''],
            ['name' => 'Belgium',                  'flag' => ''],
            ['name' => 'Brazil',                   'flag' => ''],
            ['name' => 'Cameroon',                 'flag' => ''],
            ['name' => 'Canada',                   'flag' => ''],
            ['name' => 'Costa Rica',               'flag' => ''],
            ['name' => 'Croatia',                  'flag' => ''],
            ['name' => 'Denmark',                  'flag' => ''],
            ['name' => 'Ecuador',                  'flag' => 'ecuador.png'],
            ['name' => 'England',                  'flag' => 'england.png'],
            ['name' => 'France',                   'flag' => ''],
            ['name' => 'Germany',                  'flag' => 'germany.png'],
            ['name' => 'Ghana',                    'flag' => ''],
            ['name' => 'IR Iran',                  'flag' => 'iran.png'],
            ['name' => 'Japan',                    'flag' => ''],
            ['name' => 'Mexico',                   'flag' => ''],
            ['name' => 'Morocco',                  'flag' => ''],
            ['name' => 'Netherlands',              'flag' => ''],
            ['name' => 'Poland',                   'flag' => ''],
            ['name' => 'Portugal',                 'flag' => ''],
            ['name' => 'Qatar',                    'flag' => 'qatar.png'],
            ['name' => 'Saudi Arabia',             'flag' => 'saudi-arabia.png'],
            ['name' => 'Senegal',                  'flag' => 'senegal.png'],
            ['name' => 'Serbia',                   'flag' => ''],
            ['name' => 'South Korea',              'flag' => ''],
            ['name' => 'Spain',                    'flag' => ''],
            ['name' => 'Switzerland',              'flag' => ''],
            ['name' => 'Tunisia',                  'flag' => ''],
            ['name' => 'Uruguay',                  'flag' => ''],
            ['name' => 'USA',                      'flag' => 'united-states-of-america.png'],
            ['name' => 'Wales',                    'flag' => 'wales.png'],
        ];

        Team::insert($teams);

        $games = [
            ['team1_id' => 22,     'team2_id' => 10,       'date_time' => '2022-11-20 16:00:00'],
            ['team1_id' => 11,     'team2_id' => 15,       'date_time' => '2022-11-21 16:00:00'],
            ['team1_id' => 24,     'team2_id' => 19,       'date_time' => '2022-11-21 19:00:00'],
            ['team1_id' => 31,     'team2_id' => 32,       'date_time' => '2022-11-21 22:00:00'],
            ['team1_id' => 1,      'team2_id' => 23,       'date_time' => '2022-11-22 13:00:00'],
            ['team1_id' => 9,      'team2_id' => 29,       'date_time' => '2022-11-22 16:00:00'],
            ['team1_id' => 17,     'team2_id' => 20,       'date_time' => '2022-11-22 19:00:00'],
            ['team1_id' => 12,     'team2_id' => 2,        'date_time' => '2022-11-22 22:00:00'],
            ['team1_id' => 18,     'team2_id' => 8,        'date_time' => '2022-11-23 13:00:00'],
            ['team1_id' => 13,     'team2_id' => 16,       'date_time' => '2022-11-23 16:00:00'],
            ['team1_id' => 27,     'team2_id' => 7,        'date_time' => '2022-11-23 19:00:00'],
            ['team1_id' => 3,      'team2_id' => 6,        'date_time' => '2022-11-23 22:00:00'],
            ['team1_id' => 28,     'team2_id' => 5,        'date_time' => '2022-11-24 13:00:00'],
            ['team1_id' => 30,     'team2_id' => 26,       'date_time' => '2022-11-24 16:00:00'],
            ['team1_id' => 21,     'team2_id' => 14,       'date_time' => '2022-11-24 19:00:00'],
            ['team1_id' => 4,      'team2_id' => 25,       'date_time' => '2022-11-24 22:00:00'],
            ['team1_id' => 32,     'team2_id' => 15,       'date_time' => '2022-11-25 13:00:00'],
            ['team1_id' => 22,     'team2_id' => 24,       'date_time' => '2022-11-25 16:00:00'],
            ['team1_id' => 19,     'team2_id' => 10,       'date_time' => '2022-11-25 19:00:00'],
            ['team1_id' => 11,     'team2_id' => 31,       'date_time' => '2022-11-25 22:00:00'],
            ['team1_id' => 29,     'team2_id' => 2,        'date_time' => '2022-11-26 13:00:00'],
            ['team1_id' => 20,     'team2_id' => 23,       'date_time' => '2022-11-26 16:00:00'],
            ['team1_id' => 12,     'team2_id' => 9,        'date_time' => '2022-11-26 19:00:00'],
            ['team1_id' => 1,      'team2_id' => 17,       'date_time' => '2022-11-26 22:00:00'],
            ['team1_id' => 16,     'team2_id' => 7,        'date_time' => '2022-11-27 13:00:00'],
            ['team1_id' => 3,      'team2_id' => 18,       'date_time' => '2022-11-27 16:00:00'],
            ['team1_id' => 8,      'team2_id' => 6,        'date_time' => '2022-11-27 19:00:00'],
            ['team1_id' => 27,     'team2_id' => 13,       'date_time' => '2022-11-27 22:00:00'],
            ['team1_id' => 5,      'team2_id' => 25,       'date_time' => '2022-11-28 13:00:00'],
            ['team1_id' => 26,     'team2_id' => 14,       'date_time' => '2022-11-28 16:00:00'],
            ['team1_id' => 4,      'team2_id' => 28,       'date_time' => '2022-11-28 19:00:00'],
            ['team1_id' => 21,     'team2_id' => 30,       'date_time' => '2022-11-28 22:00:00'],
            ['team1_id' => 10,     'team2_id' => 24,       'date_time' => '2022-11-29 18:00:00'],
            ['team1_id' => 19,     'team2_id' => 22,       'date_time' => '2022-11-29 18:00:00'],
            ['team1_id' => 32,     'team2_id' => 11,       'date_time' => '2022-11-29 22:00:00'],
            ['team1_id' => 15,     'team2_id' => 31,       'date_time' => '2022-11-29 22:00:00'],
            ['team1_id' => 2,      'team2_id' => 9,        'date_time' => '2022-11-30 18:00:00'],
            ['team1_id' => 29,     'team2_id' => 12,       'date_time' => '2022-11-30 18:00:00'],
            ['team1_id' => 20,     'team2_id' => 1,        'date_time' => '2022-11-30 22:00:00'],
            ['team1_id' => 23,     'team2_id' => 17,       'date_time' => '2022-11-30 22:00:00'],
            ['team1_id' => 8,      'team2_id' => 3,        'date_time' => '2022-12-01 18:00:00'],
            ['team1_id' => 6,      'team2_id' => 18,       'date_time' => '2022-12-01 18:00:00'],
            ['team1_id' => 16,     'team2_id' => 27,       'date_time' => '2022-12-01 22:00:00'],
            ['team1_id' => 7,      'team2_id' => 13,       'date_time' => '2022-12-01 22:00:00'],
            ['team1_id' => 14,     'team2_id' => 30,       'date_time' => '2022-12-02 18:00:00'],
            ['team1_id' => 26,     'team2_id' => 21,       'date_time' => '2022-12-02 18:00:00'],
            ['team1_id' => 25,     'team2_id' => 28,       'date_time' => '2022-12-02 22:00:00'],
            ['team1_id' => 5,      'team2_id' => 4,        'date_time' => '2022-12-02 22:00:00'],
        ];

        Game::insert($games);
    }
}
