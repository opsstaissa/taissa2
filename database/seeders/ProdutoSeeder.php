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
        ]);

        DB::table('produtos')->insert([
            'nome' => 'sabão',
            'quantidade' => 15,
            'preco' => 8.10,
        ]);
    }
}
