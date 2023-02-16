<?php

use Illuminate\Database\Seeder;
use App\Professor;
use Illuminate\Support\Facades\Hash;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //declare array of professors
        $professors = [
            [
                'id' => 1,
                'name' => 'Nguyễn Tuấn Duy',
                'email' => 'duy@gmail.com',
                'password' => Hash::make('duy123'),
            ],
            [
                'id' => 2,
                'name' => 'Nguyễn Văn Giang',
                'email' => 'giang@gmail.com',
                'password' => Hash::make('giang123'),
            ],
            [
                'id' => 3,
                'name' => 'Lê Xuân Hải',
                'email' => 'hai@gmail.com',
                'password' => Hash::make('hai123'),
            ],
            [
                'id' => 4,
                'name' => 'Đỗ Quỳnh Trang',
                'email' => 'trang@gmail.com',
                'password' => Hash::make('trang123'),
            ],
            [
                'id' => 5,
                'name' => 'Nghiêm Quang Tuấn',
                'email' => 'tuan@gmail.com',
                'password' => Hash::make('tuan123'),
            ],
        ];

        // create professors
        foreach ($professors as $professor) {
            Professor::create([
                'id' => $professor['id'],
                'name' => $professor['name'],
                'email' => $professor['email'],
                'password' => $professor['password'],
            ]);
        }
    }
}
