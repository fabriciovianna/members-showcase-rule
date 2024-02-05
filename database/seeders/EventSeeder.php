<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    private $eventModel;

    public function __construct(Event $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->eventModel::factory(10)->create();
    }
}
