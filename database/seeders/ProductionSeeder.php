<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Production;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=12;$i++) {
            Production::create([
                'preview' => 'prod'.$i.'_preview.jpg',
                'full' => 'prod'.$i.'_full.jpg',
            ]);
        }
    }
}
