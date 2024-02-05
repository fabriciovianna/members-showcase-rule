<?php

namespace Database\Seeders;

use App\Models\Preference;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
    private $preferenceModel;

    public function __construct(Preference $preferenceModel)
    {
        $this->preferenceModel = $preferenceModel;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->preferenceModel::factory(10)->create();
    }
}
