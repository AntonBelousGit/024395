<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(50)->create();

        foreach (Project::all() as $project)
        {
            $users = User::inRandomOrder()->take(rand(1,10))->pluck('id');
            foreach ($users as $user)
            {
                $project->users()->attach($user,['is_own' => rand(0,1)]);
            }

        }
    }
}
