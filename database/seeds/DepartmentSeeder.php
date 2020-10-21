<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Team Leader'
        ]);

        Department::create([
            'name' => 'PR & Recruiting'
        ]);

        Department::create([
            'name' => 'Finance & Sponsors'
        ]);

        Department::create([
            'name' => 'Vehicle Integration'
        ]);

        Department::create([
            'name' => 'Engine & Drivetrain'
        ]);

        Department::create([
            'name' => 'Chassis & Suspension'
        ]);

        Department::create([
            'name' => 'Electronics'
        ]);

        Department::create([
            'name' => 'Software'
        ]);

        Department::create([
            'name' => 'Team Supervisor'
        ]);
    }
}
