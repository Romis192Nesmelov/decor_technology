<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\JobImage;
use Illuminate\Support\Str;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Оформление конференций',
            'Оформление презентация',
            'Фотозоны',
            'Автомобильные бренды',
            'Прессволы',
            'Подиумы и декорации',
            'Уличные сцены',
            'Уличное декоративное оформление'
        ];

        foreach ($data as $name) {
            $job = Job::create([
                'slug' => Str::slug($name),
                'name' => $name,
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum ultrices sagittis. Aliquam justo magna, finibus vestibulum libero sed, ultrices facilisis lectus. Quisque porta eget lorem a sodales. Nunc euismod nisi in bibendum consequat. Maecenas ac quam et turpis hendrerit imperdiet. Sed eget augue et tortor pellentesque efficitur a eu sem. Aenean non dolor at mauris condimentum fringilla. Cras euismod nunc finibus consequat rutrum. Sed ac euismod quam. Donec ac purus vel diam sollicitudin venenatis sit amet eget lorem. Suspendisse potenti. Donec tincidunt mi sed gravida ornare. Donec vel urna sit amet nisi vehicula hendrerit quis vitae nibh.</p>',
                'active' => 1
            ]);

            for ($i=0;$i<4;$i++) {
                JobImage::create([
                    'preview' => 'job'.$job->id.'_'.($i+1).'_preview.jpg',
                    'full' => 'job'.$job->id.'_'.($i+1).'_full.jpg',
                    'job_id' => $job->id
                ]);
            }
        }
    }
}
