<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingsSeeder::class);
        $this->call(CarouselSeeder::class);
        $this->call(IconsSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(PartnersSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(JobsSeeder::class);
    }
}
