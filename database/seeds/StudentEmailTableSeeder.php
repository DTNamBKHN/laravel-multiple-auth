<?php

use Illuminate\Database\Seeder;
use App\StudentEmail;
class StudentEmailTableSeeder extends Seeder
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
                'email' => 'anh@gmail.com'      
            ],
            [
                'id' => 2,
                'email' => 'binh@gmail.com'      
            ],
            [
                'id' => 3,
                'email' => 'cuong@gmail.com'      
            ],
            [
                'id' => 4,
                'email' => 'duong@gmail.com'      
            ],
            [
                'id' => 5,
                'email' => 'duc@gmail.com'      
            ],
            [
                'id' => 6,
                'email' => 'hong@gmail.com'      
            ],
            [
                'id' => 7,
                'email' => 'kien@gmail.com'      
            ],
            [
                'id' => 8,
                'email' => 'lan@gmail.com'      
            ],
        ];

        foreach ($emails as $email) {
            StudentEmail::create([
                'id' => $email['id'],
                'email' => $email['email']
            ]);
        }
    }
}
