<?php

namespace Database\Seeders;

use App\Models\Message;
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

        Message::factory()->createMany([
            ['message' => 'Sacudida detectada!'],
            ['message' => 'Movimiento detectado!']
        ]);
    }
}
