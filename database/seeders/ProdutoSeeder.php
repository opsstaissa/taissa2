<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert([
            'nome' => 'detergente',
            'quantidade' => 10,
            'preco' => 20.10,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Limpol',
            'quantidade' => 20,
            'preco' => 10,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Adubo',
            'quantidade' => 120,
            'preco' => 20,
            'categoria_id' => 2
        ]);


    }
}
