<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DinosaurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dinosaurs')->insert([
            [
                'title' => 'Tyrannosaurus Rex',
                'type' => 'predator',
                'image' => 'storage/images/TyRex.jpeg',
                'image_full' => 'storage/images/TyRex_full.jpeg',
                'description' => 'Один из самых известных и свирепых динозавров.',
                'details' => 'Тираннозавр Рекс жил в конце мелового периода, около 68-66 миллионов лет назад. Длина до 12 метров, вес до 9 тонн.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Triceratops',
                'type' => 'herbivore',
                'image' => 'storage/images/Triceratops.jpg',
                'image_full' => 'storage/images/Triceratops_full.jpg',
                'description' => 'Полный скелет трицератопса до сих пор не найден...',
                'details' => 'Трицератопс — род растительноядных динозавров из семейства цератопсид.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sauroposeidon',
                'type' => 'herbivore',
                'image' => 'storage/images/Sauroposeidon.jpg',
                'image_full' => 'storage/images/Sauroposeidon_full.jpg',
                'description' => 'Завропосейдон был последним раннемеловым завроподом Северной Америки.',
                'details' => 'Один из самых высоких динозавров — до 18 м.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Utahraptor',
                'type' => 'predator',
                'image' => 'storage/images/Utahraptor.jpg',
                'image_full' => 'storage/images/Utahraptor_full.jpg',
                'description' => 'Ютараптор был одним из крупнейших представителей своего семейства.',
                'details' => 'Длина 6–7 м, масса около 500 кг.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Stegosaurus',
                'type' => 'herbivore',
                'image' => 'storage/images/Stegosaurus.jpg',
                'image_full' => 'storage/images/Stegosaurus_full.jpg',
                'description' => 'Стегозавр — один из самых узнаваемых динозавров.',
                'details' => 'Существовал 155–145 млн лет назад.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
