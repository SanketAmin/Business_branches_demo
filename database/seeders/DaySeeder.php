<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['name' => 'Monday', 'abbr' => 'Mon'],
            ['name' => 'Tuesday', 'abbr' => 'Tue'],
            ['name' => 'Wednesday', 'abbr' => 'Wed'],
            ['name' => 'Thursday', 'abbr' => 'Thu'],
            ['name' => 'Friday', 'abbr' => 'Fri'],
            ['name' => 'Saturday', 'abbr' => 'Sat'],
            ['name' => 'Sunday', 'abbr' => 'Sun'],
        ];


        foreach ($days as $day){
            Day::create($day);
        }
    }
}
