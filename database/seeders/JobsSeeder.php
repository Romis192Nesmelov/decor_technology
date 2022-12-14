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
            [
                'name' => 'Оформление конференций',
                'description' => '<p>От оформления конференции всегда зависит её результат. Каждая маленькая деталь должна быть продумана. Dekor Technology сделает всё, чтобы ваша конференция была максимально продуктивной и комфортной. Современное техническое оснащение позволит выступающим полностью донести всю необходимую информацию до зрителей. Привлекательное оформление сцены не оставит равнодушным даже самый требовательный взгляд. Правильное расположение всех окружающих предметов позволит наблюдателю с любого места увидеть и понять все важные детали выступления.</p>'
            ],
            [
                'name' => 'Оформление презентаций',
                'description' => '<p>Успех любого продукта очень часто кроется в его правильной презентации. Dekor Technology уже много раз помогала известным брендам правильно представить их новое творение. Внимание будущих покупателей и инвесторов сосредоточено на всех главных плюсах устройства. Разные материалы и стили оформления придают каждой презентации оригинальности.  Сочетание информативности и внешней привлекательности оставляет наилучшее впечатление о любом продукте.</p>'
            ],
            [
                'name' => 'Фотозоны',
                'description' => '<p>Любое мероприятие будет оставаться в памяти гораздо дольше, если после него у посетителя что- то осталось. Например, фотография. Decor Technology создаёт фотозоны с яркими и запоминающимися декорациями. Увидев такую фотографию даже через много лет, посетитель будет тепло отзываться о месте, где её сделал. Оригинальность окружающей обстановки привлечет внимание людей любого возраста, ведь так приятно отвлечься от каждодневной суеты и перенестись в реальность, созданную Dekor Technology.</p>'
            ],
            [
                'name' => 'Автомобильные бренды',
                'description' => '<p>Особое внимание стоит обратить на работу Dekor Technology с автомобильными брендами. Мероприятия по презентации новых моделей требуют всего профессионализма наших работников. Перед ними стоит задача создать окружающую обстановку, которая подчеркнёт все плюсы модели. Автомобиль и предметы вокруг дополняют друг друга и могут существовать только вместе. Даже спустя долгое время посетителю будет интересно осмотреть модель ещё раз.</p>'
            ],
            [
                'name' => 'Прессволы',
                'description' => '<p>Ярко, броско, информативно и  оригинально.  Всё это про прессволы, оформленные Dekor Technology. Для наших клиентов мы создаём идеальный интерьер для любого мероприятия. Универсальные прессволы станут отличным фоном каждого выступления, интервью или церемонии. Результат работы всегда выглядит абсолютно по-разному, но неизменной остается его привлекательность.</p>'
            ],
            [
                'name' => 'Подиумы и декорации',
                'description' => '<p>Правильное оформление подиума на показе всегда приносит часть его успеха. Ничто не должно отвлекать зрителя от основного действия. Dekor Technology заботится о комфорте всех участников мероприятия. Общий стиль прослеживается в каждой детали. Окружающие декорации отвечают всем требованиям показов даже самого высокого уровня. Качественное освещение и хорошо проработанная цветовая палитра позволяют наблюдать за происходящим на сцене с удовольствием. Выступление на таком подиуме тяжело забыть.</p>'
            ],
            [
                'name' => 'Уличные сцены',
                'description' => '<p>Мероприятия на улице всегда являются хорошей рекламой любого бренда. Уличные сцены, оформленные Dekor Technology, всегда заметны издалека. В сочетании с ярким выступлением, такая сцена привлечёт всех проходящих рядом людей и поможет им узнать о вашей компании. Наша команда профессионалов позаботится об оригинальности конструкции и ярком оформлении каждого места для выступления. Вам остается только наслаждаться выступлением перед аудиторией.</p>'
            ],
            [
                'name' => 'Уличное декоративное оформление',
                'description' => '<p>Основная задача уличного декоративного оформления - привлечь внимание. Dekor Technology сделает всё, чтобы ни один человек не прошел мимо Вас. Мы используем разные материалы, которые необходимы для идеального оформления Вашего проекта. Особенная атмосфера появляется в любом месте, над которым работает компания Dekor Technology. Наши декорации украсят каждое мероприятие на улице.</p>'
            ]
        ];

        foreach ($data as $item) {
            $item['slug'] = Str::slug($item['name']);
            $item['active'] = 1;
            $job = Job::create($item);

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
