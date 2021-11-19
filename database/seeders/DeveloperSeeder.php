<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developers = [
            [
                'developer' => 'DEV1',
                'user_name' => Str::slug('DEV1'),
                'level' => 1,
                'duration' => 1
            ],
            [
                'developer' => 'DEV2',
                'user_name' => Str::slug('DEV2'),
                'level' => 2,
                'duration' => 1
            ],
            [
                'developer' => 'DEV3',
                'user_name' => Str::slug('DEV3'),
                'level' => 3,
                'duration' => 1
            ],
            [
                'developer' => 'DEV4',
                'user_name' => Str::slug('DEV4'),
                'level' => 4,
                'duration' => 1
            ],
            [
                'developer' => 'DEV5',
                'user_name' => Str::slug('DEV5'),
                'level' => 5,
                'duration' => 1
            ]
        ];

        foreach ($developers as $developer) {
            if (!Developer::where('user_name', $developer['user_name'])->exists()) {
                $newDeveloper = new Developer();
                $newDeveloper->user_name = $developer['user_name'];
                $newDeveloper->developer = $developer['developer'];
                $newDeveloper->level = $developer['level'];
                $newDeveloper->duration = $developer['duration'];
                $newDeveloper->save();
            
            }
        }
    }
}
