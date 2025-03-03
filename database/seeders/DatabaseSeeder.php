<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = [
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("enjoin1234"),
            "is_admin" => 0,
        ];


        foreach ($admin as $key => $value) {
            DB::table("users")->insert($admin);
        }

    }
}
