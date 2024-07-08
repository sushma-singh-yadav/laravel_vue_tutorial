<?php

namespace Database\Seeders;

use App\Models\ContactModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ContactModel::factory()
            ->count(50)
            ->create();
    }
}
