<?php

namespace Database\Seeders;

use App\Models\Rutina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rutina::factory()->count(10)->create();
    }
}
