<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(UsersSeeder::class);
<<<<<<< HEAD
        $this->call(LetterFormatsSeeder::class);
        $this->call(LettersSeeder::class);
=======
        $this->call(LetterFormatSeeder::class);
        // $this->call(LettersSeeder::class);
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
    }
}
