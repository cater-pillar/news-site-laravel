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
        DB::table('categories')->insert(['slug' => 'drustvo', 'name' => 'Društvo']); 
        DB::table('categories')->insert(['slug' => 'kultura', 'name' => 'Kultura']); 
        DB::table('categories')->insert(['slug' => 'politika', 'name' => 'Politika']); 
        DB::table('categories')->insert(['slug' => 'ekonomija', 'name' => 'Ekonomija']); 
        DB::table('categories')->insert(['slug' => 'zabava', 'name' => 'Zabava']); 
        DB::table('categories')->insert(['slug' => 'hronika', 'name' => 'Hronika']); 
        DB::table('categories')->insert(['slug' => 'sport', 'name' => 'Sport']); 


        DB::table('towns')->insert(['slug' => 'leskovac', 'name' => 'Leskovac']); 
        DB::table('towns')->insert(['slug' => 'nis', 'name' => 'Niš']); 
        DB::table('towns')->insert(['slug' => 'pirot', 'name' => 'Pirot']); 
        DB::table('towns')->insert(['slug' => 'prokuplje', 'name' => 'Prokuplje']); 
        DB::table('towns')->insert(['slug' => 'vranje', 'name' => 'Vranje']); 
        DB::table('towns')->insert(['slug' => 'aleksinac', 'name' => 'Aleksinac']); 
        DB::table('towns')->insert(['slug' => 'babusnica', 'name' => 'Babušnica']); 
        DB::table('towns')->insert(['slug' => 'bela-palanka', 'name' => 'Bela Palanka']);
        DB::table('towns')->insert(['slug' => 'blace', 'name' => 'Blace']); 
        DB::table('towns')->insert(['slug' => 'bujanovac', 'name' => 'Bujanovac']); 
        DB::table('towns')->insert(['slug' => 'bojnik', 'name' => 'Bojnik']); 
        DB::table('towns')->insert(['slug' => 'crna-trava', 'name' => 'Crna Trava']);
        DB::table('towns')->insert(['slug' => 'dimitrovgrad', 'name' => 'Dimitrovgrad']);
        DB::table('towns')->insert(['slug' => 'doljevac', 'name' => 'Doljevac']);
        DB::table('towns')->insert(['slug' => 'gadzin-han', 'name' => 'Gadžin Han']);    
        DB::table('towns')->insert(['slug' => 'bosilegrad', 'name' => 'Bosilegrad']);
        DB::table('towns')->insert(['slug' => 'kursumlija', 'name' => 'Kuršumlija']); 
        DB::table('towns')->insert(['slug' => 'lebane', 'name' => 'Lebane']);
        DB::table('towns')->insert(['slug' => 'medvedja', 'name' => 'Medveđa']);
        DB::table('towns')->insert(['slug' => 'merosina', 'name' => 'Merošina']);
        DB::table('towns')->insert(['slug' => 'presevo', 'name' => 'Preševo']);
        DB::table('towns')->insert(['slug' => 'razanj', 'name' => 'Ražanj']);
        DB::table('towns')->insert(['slug' => 'sokobanja', 'name' => 'Sokobanja']);
        DB::table('towns')->insert(['slug' => 'surdulica', 'name' => 'Surdulica']);
        DB::table('towns')->insert(['slug' => 'svrljig', 'name' => 'Svrljig']);
        DB::table('towns')->insert(['slug' => 'trgoviste', 'name' => 'Trgovište']);
        DB::table('towns')->insert(['slug' => 'vladicin-han', 'name' => 'Vladičin Han']);  
        DB::table('towns')->insert(['slug' => 'vlasotince', 'name' => 'Vlasotince']); 
        DB::table('towns')->insert(['slug' => 'zitoradja', 'name' => 'Žitorađa']); 


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
