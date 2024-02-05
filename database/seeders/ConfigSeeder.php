<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    private $configModel;

    public function __construct(Config $configModel)
    {
        $this->configModel = $configModel;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->configModel::factory(10)->create();
    }
}
