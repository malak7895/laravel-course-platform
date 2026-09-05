<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Student::factory(10)->create();
        Course::factory(5)->create();
        Task::factory(15)->create();
    }
}