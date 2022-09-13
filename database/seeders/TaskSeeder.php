<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $project = Project::first();

        for ($i=0; $i < 100; $i++) { 
            $data = [
                'name' => fake()->sentence(3),
                'project_id' => 1,
                'description' => fake()->paragraph(),
                'status' => 'PENDING',
            ];

            Task::create($data);
    
        }

    }
}