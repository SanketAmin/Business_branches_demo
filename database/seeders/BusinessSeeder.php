<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'name' => 'Business 1',
                'email' => 'business1@example.com',
                'phone_number' => '1234567890',
                'logo' => 'https://dummyimage.com/600x400/000/fff&text=Business1',
            ],
            [
                'name' => 'Business 2',
                'email' => 'business2@example.com',
                'phone_number' => '9876543210',
                'logo' => 'https://dummyimage.com/600x400/000/fff&text=Business2',
            ],
            [
                'name' => 'Business 3',
                'email' => 'business3@example.com',
                'phone_number' => '9876587788',
                'logo' => 'https://dummyimage.com/600x400/000/fff&text=Business3',
            ]
        ];

        foreach ($array as $arr){
            Business::create($arr);
        }
    }
}
