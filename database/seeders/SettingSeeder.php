<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;use Illuminate\Support\Arr;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        $data = [];
        $languages = Language::all();

        foreach ($languages as $key => $language) {
            $data[$key] = [
                [
                    'language_id' => $language->id,
                    'col' => '6',
                    'group' => 'general',
                    'key' => 'site_url',
                    'type' => 'text',
                    'name' => 'Site Url',
                    'value' => 'http://127.0.0.1:8000',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '6',
                    'group' => 'general',
                    'key' => 'title',
                    'type' => 'text',
                    'name' => 'Site Başlığı',
                    'value' => 'Vezirhan Emirgan',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'general',
                    'key' => 'description',
                    'type' => 'textarea',
                    'name' => 'Anasayfa Açıklaması',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '6',
                    'group' => 'mail',
                    'key' => 'smtp_mail',
                    'type' => 'text',
                    'name' => 'İletişim Bilgi E-Posta (Mailin gönderileceği adres)',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '6',
                    'group' => 'mail',
                    'key' => 'smtp_server',
                    'type' => 'text',
                    'name' => 'SMTP Sunucu',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '6',
                    'group' => 'mail',
                    'key' => 'smtp_username',
                    'type' => 'text',
                    'name' => 'SMTP Kullanıcı Adı',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '6',
                    'group' => 'mail',
                    'key' => 'smtp_password',
                    'type' => 'text',
                    'name' => 'SMTP Parolası',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'meta',
                    'key' => 'header_extra',
                    'type' => 'textarea',
                    'name' => 'Header Exkstra İçerikleri',
                    'value' => null,
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'social',
                    'key' => 'facebook',
                    'type' => 'text',
                    'name' => 'Facebook',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'social',
                    'key' => 'instagram',
                    'type' => 'text',
                    'name' => 'Instagram',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'social',
                    'key' => 'twitter',
                    'type' => 'text',
                    'name' => 'Twitter',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'social',
                    'key' => 'youtube',
                    'type' => 'text',
                    'name' => 'Youtube',
                    'value' => '',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '4',
                    'group' => 'contact',
                    'type' => 'text',
                    'key' => 'company_name',
                    'name' => 'Firma Adı',
                    'value' => 'Vezirhan Emirgan',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '4',
                    'group' => 'contact',
                    'key' => 'phone',
                    'type' => 'textarea',
                    'name' => 'Telefon (Her satıra 1 tane)',
                    'value' => '+90 216 349 49 08',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '4',
                    'group' => 'contact',
                    'key' => 'email',
                    'type' => 'text',
                    'name' => 'E-Posta Adresi',
                    'value' => '#',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'contact',
                    'key' => 'address',
                    'type' => 'textarea',
                    'name' => 'Adres (Her satıra 1 tane)',
                    'value' => 'Mecli̇si̇ Mebusan Cad. No:61 Zimmer Otel Fındıklı / Beyoğlu / İstanbul',
                ],
                [
                    'language_id' => $language->id,
                    'group' => 'contact',
                    'key' => 'google_map',
                    'type' => 'text',
                    'name' => 'Google Map Adresi',
                    'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6019.436195844513!2d28.988848000000004!3d41.031423!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb9ac68a58aeaf9c!2zTHVsdSBGxLFuZMSxa2zEsQ!5e0!3m2!1str!2str!4v1643019213868!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '4',
                    'group' => 'theme',
                    'key' => 'logo',
                    'type' => 'image',
                    'name' => 'Logo',
                    'value' => 'logo',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '4',
                    'group' => 'theme',
                    'key' => 'favicon',
                    'type' => 'image',
                    'name' => 'Favicon',
                    'value' => 'favicon',
                ],
                [
                    'language_id' => $language->id,
                    'col' => '4',
                    'group' => 'theme',
                    'key' => 'footer_background',
                    'type' => 'image',
                    'name' => 'Alt İletişim Arkaplan',
                    'value' => 'footer_background',
                ],
            ];
        }
        $data = Arr::collapse($data);


        foreach ($data as $item) {
            switch ($item['group']) {
                case 'general':
                    $item['group_title'] = "Genel Ayarlar";
                    break;
                case 'social':
                    $item['group_title'] = "Sosyal Medya Ayarları";
                    break;
                case 'mail':
                    $item['group_title'] = "Mail Ayarları";
                    break;
                case 'meta':
                    $item['group_title'] = "Meta Etiket Ayarları";
                    break;
                case 'contact':
                    $item['group_title'] = "İletişim Ayarları";
                    break;
                case 'theme':
                    $item['group_title'] = "Tema Ayarları";
                    break;
            }
            $item['updated_at'] = $item['created_at'] = Carbon::now();
            Setting::insert($item);
        }
    }
}
