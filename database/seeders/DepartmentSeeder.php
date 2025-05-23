<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $departments = ['Managing Director', 'General Manager', 'Human Resources', 'Finance', 'Contract', 'Information Technology', 'Operation'];

        foreach ($departments as $name) {
            Department::create(['name' => $name]);
        }
    }
}
