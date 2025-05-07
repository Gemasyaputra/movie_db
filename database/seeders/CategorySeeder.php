<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
          [
            'categori_name' => 'Action',
            'description' => 'Action film with full action',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'categori_name' => 'Comedy',
            'description' => 'film yang lucu dan menyenangkan',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'categori_name' => 'Drama',
            'description' => 'film drama yang menarik tentang perjuangan dan kejujuran serta persahabatan juga keluarga',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'categori_name' => 'Sci-Fi',
            'description' => 'film sci-fi yang menarik dan menghibur',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'categori_name' => 'Romance',
            'description' => 'film yang menceritakan tentang cinta dan romansa',
            'created_at' => now(),
            'updated_at' => now(),
          ],  
        ]);
    }
}
