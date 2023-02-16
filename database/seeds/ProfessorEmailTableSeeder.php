<?php

use Illuminate\Database\Seeder;
use App\ProfessorEmail;
class ProfessorEmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = [
            [
                'id' => 1,
                'email' => 'duy@gmail.com'      
            ],
            [
                'id' => 2,
                'email' => 'giang@gmail.com'      
            ],
            [
                'id' => 3,
                'email' => 'hai@gmail.com'      
            ],
            [
                'id' => 4,
                'email' => 'trang@gmail.com'      
            ],
            [
                'id' => 5,
                'email' => 'tuan@gmail.com'      
            ],
        ];

        foreach ($emails as $email) {
            ProfessorEmail::create([
                'id' => $email['id'],
                'email' => $email['email']
            ]);
        }
    }
}
