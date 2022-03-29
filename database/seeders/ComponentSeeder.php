<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Contact;
use App\Models\Home;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Home::create([
            'title' => 'Tazaka Elektrik Teknologi',
            'sub_title' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vero dolore dolorem commodi modi aspernatur recusandae eum aut, magni mollitia, ipsa voluptate quis eos, necessitatibus atque natus dicta odit culpa.'
        ]);

        About::create([
            'title' => 'Tazaka Elektrik Teknologi',
            'sub_title' => 'Tazaka Elektrik Teknologi',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vero dolore dolorem commodi modi aspernatur recusandae eum aut, magni mollitia, ipsa voluptate quis eos, necessitatibus atque natus dicta odit culpa.'
        ]);

        Contact::create([
            'addres' => 'Bandung',
            'email' => 'tazaka@gmail.com',
            'telp' => '089736283',
            'maps' => 'Bandung'
        ]);
    }
}
