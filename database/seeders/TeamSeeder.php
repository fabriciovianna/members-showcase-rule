<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    private $teamModel;

    public function __construct(Team $teamModel)
    {
        $this->teamModel = $teamModel;
    }
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->teamModel::factory(10)->create();
    }
}
