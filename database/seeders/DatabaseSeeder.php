<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' =>'Super Admin',
            'post' =>'1',
            'category' =>'1',
            'division' =>'1',
            'district' =>'1',
            'menu' =>'1',
            'photo_gallery' =>'1',
            'video' =>'1',
            'seo' =>'1',
            'general_setting' =>'1',
            'header' =>'1',
            'footer' =>'1',
            'ads' =>'1',
            'status' =>'1',
        ]);

        DB::table('users')->insert([
            'role_id' =>'1',
            'name' =>'Mohiuddin',
            'email' =>'webservice24.org@gmail.com',
            'phone' =>'01831332732',
            'address' =>'farmgate',
            'description' =>'here is your description',
            'facebook' =>'https://facebook.com/ceo.mwt/',
            'twitter' =>'https://twitter.com/ceo.mwt/',
            'instagram' =>'https://instagram.com/ceo.mwt/',
            'youtube' =>'https://youtube.com/ceo.mwt/',
            'password' => Hash::make('password'),
            'description' =>'user description here',
        ]);

        // \App\Models\User::factory(10)->create();
        DB::table('categories')->insert([
            'category_name' =>'National',
            'category_slug' =>'national',
            'category_desc' =>'Category Description',
        ]);

        DB::table('posts')->insert([
            'user_id' =>'1',
            'post_title' =>'Hellow World!',
            'post_details' =>'lorem ipsum text for default post description',
            'category_id' =>'1',
        ]);

        

        DB::table('socials')->insert([
            'facebook' =>'facebook.com',
            'twitter' =>'twitter.com',
            'instagram' =>'instagram.com',
            'youtube' =>'youtube.com',
            'linkedin' =>'linkedin.com',
        ]);
        
        DB::table('s_e_o_s')->insert([
            'meta_author' => 'Insert your seo meta',
            'meta_title' => 'Insert your seo meta',
            'meta_description' => 'Insert your seo meta',
            'meta_keywords' => 'Insert your seo meta',
            'google_analytics' => 'Insert your seo meta',
            'google_verification' => 'Insert your seo meta',
            'baidu_verification' => 'Insert your seo meta',
            'yandex_verification' => 'Insert your seo meta',
        ]);
    }
}
