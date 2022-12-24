<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'contact' => '+7(926)572-20-98',
                'name' => 'Роман',
                'is_phone' => 1
            ],
//            [
//                'contact' => '+7(926)602-54-87',
//                'name' => 'Максим',
//                'is_phone' => 1
//            ],
            [
                'contact' => '+7(903)678-75-25',
                'name' => 'Алексей',
                'is_phone' => 1
            ],
            [
                'contact' => 'DekorTechnology@mail.ru',
                'name' => '',
                'is_phone' => 0
            ],
        ];

        foreach($data as $item) {
            Contact::create($item);
        }
    }
}
