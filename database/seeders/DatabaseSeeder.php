<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
        DB::table('categories')->insert(['name' => 'Društvo']); 
        DB::table('categories')->insert(['name' => 'Kultura']); 
        DB::table('categories')->insert(['name' => 'Politika']); 
        DB::table('categories')->insert(['name' => 'Ekonomija']); 
        DB::table('categories')->insert(['name' => 'Zabava']); 
        DB::table('categories')->insert(['name' => 'Hronika']); 
        DB::table('categories')->insert(['name' => 'Sport']); 


        DB::table('towns')->insert(['name' => 'Leskovac']); 
        DB::table('towns')->insert(['name' => 'Niš']); 
        DB::table('towns')->insert(['name' => 'Pirot']); 
        DB::table('towns')->insert(['name' => 'Prokuplje']); 
        DB::table('towns')->insert(['name' => 'Vranje']); 
        DB::table('towns')->insert(['name' => 'Aleksinac']); 
        DB::table('towns')->insert(['name' => 'Babušnica']); 
        DB::table('towns')->insert(['name' => 'Bela Palanka']);
        DB::table('towns')->insert(['name' => 'Blace']); 
        DB::table('towns')->insert(['name' => 'Bujanovac']); 
        DB::table('towns')->insert(['name' => 'Bojnik']); 
        DB::table('towns')->insert(['name' => 'Crna Trava']);
        DB::table('towns')->insert(['name' => 'Dimitrovgrad']);
        DB::table('towns')->insert(['name' => 'Doljevac']);
        DB::table('towns')->insert(['name' => 'Gadžin Han']);    
        DB::table('towns')->insert(['name' => 'Bosilegrad']);
        DB::table('towns')->insert(['name' => 'Kuršumlija']); 
        DB::table('towns')->insert(['name' => 'Lebane']);
        DB::table('towns')->insert(['name' => 'Medveđa']);
        DB::table('towns')->insert(['name' => 'Merošina']);
        DB::table('towns')->insert(['name' => 'Preševo']);
        DB::table('towns')->insert(['name' => 'Ražanj']);
        DB::table('towns')->insert(['name' => 'Sokobanja']);
        DB::table('towns')->insert(['name' => 'Surdulica']);
        DB::table('towns')->insert(['name' => 'Svrljig']);
        DB::table('towns')->insert(['name' => 'Trgovište']);
        DB::table('towns')->insert(['name' => 'Vladičin Han']);  
        DB::table('towns')->insert(['name' => 'Vlasotince']); 
        DB::table('towns')->insert(['name' => 'Žitorađa']); 


        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password!'),
            'is_admin' => true,
        ]);

        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            UserSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
