<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    private $memberModel;

    public function __construct(Member $memberModel)
    {
        $this->memberModel = $memberModel;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->memberModel::factory(10)->create();
    }
}
