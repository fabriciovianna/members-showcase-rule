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
            return response()->failed(['message' => 'There was a problem trying to seed the table members']);
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
            return response()->json(['message' => 'There was a problem trying to seed the table members']);
        }
    }
}
