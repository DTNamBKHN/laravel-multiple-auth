<?php

use Illuminate\Database\Seeder;
use App\Student;
use Illuminate\Support\Facades\Hash;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'id' => 1,
                'student_group_id' => 1,
                'name' => 'Nguyễn Tiến Anh',
                'email' => 'anh@gmail.com',
                'password' => Hash::make('anh123'),
            ],
            [
                'id' => 2,
                'student_group_id' => 1,
                'name' => 'Trần Thế Bình',
                'email' => 'binh@gmail.com',
                'password' => Hash::make('binh123'),
            ],
            [
                'id' => 3,
                'student_group_id' => 2,
                'name' => 'Lê Văn Cường',
                'email' => 'cuong@gmail.com',
                'password' => Hash::make('cuong123'),
            ],
            [
                'id' => 4,
                'student_group_id' => 2,
                'name' => 'Phùng Thái Dương',
                'email' => 'duong@gmail.com',
                'password' => Hash::make('duong123'),
            ],
            [
                'id' => 5,
                'student_group_id' => 3,
                'name' => 'Dương Văn Đức',
                'email' => 'duc@gmail.com',
                'password' => Hash::make('duc123'),
            ],
            [
                'id' => 6,
                'student_group_id' => 3,
                'name' => 'Nguyễn Thị Hồng',
                'email' => 'hong@gmail.com',
                'password' => Hash::make('hong123'),
            ],
            [
                'id' => 7,
                'student_group_id' => 4,
                'name' => 'Trần Trung Kiên',
                'email' => 'kien@gmail.com',
                'password' => Hash::make('kien123'),
            ],
            [
                'id' => 8,
                'student_group_id' => 4,
                'name' => 'Lê Thị Lan',
                'email' => 'lan@gmail.com',
                'password' => Hash::make('lan123'),
            ],
        ];

        // create students
        foreach ($students as $student) {
            Student::create([
                'id' => $student['id'],
                'student_group_id' => $student['student_group_id'],
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => $student['password'],
            ]);
        }
    }
}
