<?php

use App\Contact;
use App\Fasilitas;
use App\User;
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
        // Add user table seeder 
        User::create([
            'username'    => 'qkohst',
            'email'    => 'kukohsantoso013@gmail.com',
            'password'    => bcrypt('123456'),
            'role' => 1,
            'avatar' => 'default.png'
        ]);

        // Add contact table seeder 
        Contact::create([
            'alamat'    => 'Ds. Dikir Kec. Tambakboyo Kab. Tuban',
            'email'    => 'kukohsantoso013@gmail.com',
            'nomor_telpon'    => '6285232077932',
            'embed_google_maps'    => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.238696518603!2d111.78198331530017!3d-6.861971469043985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e770b9f98edd767%3A0x3d7620cbb06cc0a4!2sQkoh%20St!5e0!3m2!1sen!2sid!4v1651591821626!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'link_telegram'    => 'https://t.me/qkohst',
            'link_twitter'    => 'https://twitter.com/qkohst',
            'link_facebook'    => 'https://web.facebook.com/qkohst',
            'link_instagram'    => 'https://www.instagram.com/qkoh_st',
            'link_youtube'    => 'https://www.youtube.com/channel/UCHO5t3O1satYKfGnlxGDVsg/videos',
        ]);

        // Add fasilitas table seeder 
        Fasilitas::create([
            'nama_fasilitas'    => 'Forum Diskusi',
            'icon'    => '<i class="icofont-ui-text-chat"></i>',
            'deskripsi'    => 'Diskusikan materi belajar dengan siswa lainnya.'
        ]);
        Fasilitas::create([
            'nama_fasilitas'    => 'Sertifikat',
            'icon'    => '<i class="icofont-license"></i>',
            'deskripsi'    => 'Dapatkan sertifikat kompetensi setelah menyelesaikan kelas ini.'
        ]);
    }
}
