<?php

use Illuminate\Database\Seeder;
use App\StudentGroup;

class StudentGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // declare array of student groups object
        $student_groups = [
            [
                'id' => 1,
                'name' => 'Việt Nhật',
            ],
            [
                'id' => 2,
                'name' => 'ICT',
            ],
            [
                'id' => 3,
                'name' => 'Kỹ sư tài năng',
            ],
            [
                'id' => 4,
                'name' => 'SIE',
            ],
        ];
        foreach ($student_groups as $student_group) {
            StudentGroup::create([
                'id' => $student_group['id'],
                'name' => $student_group['name'],
            ]);
        }
    }
}
