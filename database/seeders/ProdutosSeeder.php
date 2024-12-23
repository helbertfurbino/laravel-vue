<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            ['nome' => 'Caneca', 'preco' => 20],
            ['nome' => 'Caderno', 'preco' => 30],
            ['nome' => 'Lápis', 'preco' => 40],
            ['nome' => 'Mochila', 'preco' => 60],
            ['nome' => 'Relógio', 'preco' => 80],
        ];

        DB::table('produtos')->insert($produtos);
    }
}
