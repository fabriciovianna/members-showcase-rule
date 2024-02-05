<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;


class DatabaseSeederController extends Controller
{
    /**
     * Seeds members table.
     */
    public function member()
    {
        try {
            Artisan::call('db:seed --class=MemberSeeder');
            return response()->json(['message' => 'Members table was successfully seeded!']);
        } catch (\Throwable $th) {
            report($th);
            return response()->json(['message' => 'There was a problem trying to seed the table members'], 500);
        }
    }

    /**
     * Seeds teams table.
     */
    public function team()
    {
        try {
            Artisan::call('db:seed --class=TeamSeeder');
            return response()->json(['message' => 'Teams table was successfully seeded!']);
        } catch (\Throwable $th) {
            report($th);
            return response()->json(['message' => 'There was a problem trying to seed the table teams'], 500);
        }
    }

    /**
     * Seeds preferences table.
     */
    public function preference()
    {
        try {
            Artisan::call('db:seed --class=PreferenceSeeder');
            return response()->json(['message' => 'Preferences table was successfully seeded!']);
        } catch (\Throwable $th) {
            report($th);
            return response()->json(['message' => 'There was a problem trying to seed the table preferences'], 500);
        }
    }

    /**
     * Seeds events table.
     */
    public function event()
    {
        try {
            Artisan::call('db:seed --class=EventsSeeder');
            return response()->json(['message' => 'Events table was successfully seeded!']);
        } catch (\Throwable $th) {
            report($th);
            return response()->json(['message' => 'There was a problem trying to seed the table events'], 500);
        }
    }

    /**
     * Seeds events table.
     */
    public function config()
    {
        try {
            Artisan::call('db:seed --class=EventsSeeder');
            return response()->json(['message' => 'Events table was successfully seeded!']);
        } catch (\Throwable $th) {
            report($th);
            return response()->json(['message' => 'There was a problem trying to seed the table events'], 500);
        }
    }
}
