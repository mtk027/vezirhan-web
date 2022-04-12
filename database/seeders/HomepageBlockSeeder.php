<?php

namespace Database\Seeders;

use App\Models\HomepageBlock;
use Illuminate\Database\Seeder;

class HomepageBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomepageBlock::truncate();

        $data = [
            [
                'language_id' => 1,
                'key' => 'block1',
                'title' => 'Slider',
                'status' => 1,
                'row_number' => 1,
            ],
            [
                'language_id' => 1,
                'key' => 'block2',
                'title' => 'Özellikler',
                'status' => 1,
                'row_number' => 2,
            ],
            [
                'language_id' => 1,
                'key' => 'block3',
                'title' => 'Hakkımızda',
                'json' => '{"title":"Bizim Hikayemiz","image": "hakkimizda","description":"<p>Laleleriyle meşhur Emirgan Korusu\'nun altında \'İstanbul içinde bir Emirgan yeterli.\' şiiri ile anılan <b>Emirgan semtinde Vezirhan Emirgan Restoran</b> olarak eşsiz boğaz manzarası ve dünya mutfağıyla sizlere hergün üstün memnuniyet kalitesiyle hizmet veriyoruz.</p>","data":[{"title":"Yemek Çeşidi","percentage":"74"},{"title":"Müşteri Memnuniyeti","percentage":"32"},{"title":"Kaliteli Hizmet","percentage":"55"},{"title":"Profesyonel Çalışan","percentage":"65"},{"title":"7/24 Hızlı Sipariş","percentage":"93"},{"title":"","percentage":""}]}',
                'status' => 1,
                'row_number' => 3,
            ],
            [
                'language_id' => 1,
                'key' => 'block4',
                'title' => 'Bize Sorun',
                'json' => '{"image":"bize_sorun"}',
                'status' => 1,
                'row_number' => 4,
            ],
            [
                'language_id' => 1,
                'key' => 'block5',
                'title' => 'Mutlu Müşteriler',
                'json' => '{"title":"Mutlu Müşteriler","sub_title":"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.","image": "happy_customer"}',
                'status' => 1,
                'row_number' => 5,
            ],
            [
                'language_id' => 1,
                'key' => 'block6',
                'title' => 'Instagram',
                'json' => '{"title":"instagram\'da @lulu.lounge"}',
                'status' => 0,
                'row_number' => 6,
            ], [
                'language_id' => 2,
                'key' => 'block1',
                'title' => 'Slider',
                'status' => 1,
                'row_number' => 1,
            ],
            [
                'language_id' => 2,
                'key' => 'block2',
                'title' => 'Özellikler',
                'status' => 1,
                'row_number' => 2,
            ],
            [
                'language_id' => 2,
                'key' => 'block3',
                'title' => 'Hakkımızda',
                'json' => '{"title":"Bizim Hikayemiz","image": "hakkimizda","description":"<p>Laleleriyle meşhur Emirgan Korusu\'nun altında \'İstanbul içinde bir Emirgan yeterli.\' şiiri ile anılan <b>Emirgan semtinde Vezirhan Emirgan Restoran</b> olarak eşsiz boğaz manzarası ve dünya mutfağıyla sizlere hergün üstün memnuniyet kalitesiyle hizmet veriyoruz.</p>","data":[{"title":"Yemek Çeşidi","percentage":"74"},{"title":"Müşteri Memnuniyeti","percentage":"32"},{"title":"Kaliteli Hizmet","percentage":"55"},{"title":"Profesyonel Çalışan","percentage":"65"},{"title":"7/24 Hızlı Sipariş","percentage":"93"},{"title":"","percentage":""}]}',
                'status' => 1,
                'row_number' => 3,
            ],
            [
                'language_id' => 2,
                'key' => 'block4',
                'title' => 'Bize Sorun',
                'json' => '{"image":"bize_sorun"}',
                'status' => 1,
                'row_number' => 4,
            ],
            [
                'language_id' => 2,
                'key' => 'block5',
                'title' => 'Mutlu Müşteriler',
                'json' => '{"title":"Mutlu Müşteriler","sub_title":"Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.","image": "happy_customer"}',
                'status' => 1,
                'row_number' => 5,
            ],
            [
                'language_id' => 2,
                'key' => 'block6',
                'title' => 'Instagram',
                'json' => '{"title":"instagram\'da @lulu.lounge"}',
                'status' => 0,
                'row_number' => 6,
            ]
        ];

        foreach ($data as $item) {
            HomepageBlock::insert($item);
        }
    }
}
