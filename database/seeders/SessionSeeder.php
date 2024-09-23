<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('session')->insert([
            ["name" => "Acoes de Empresas", "icon" => "IoIosBusiness", "color" => "#6264b3"], ["name" => "Criptomoedas", "icon" => "FaBitcoin", "color" => "#6d8ded"], ["name" => "Fundos Imobiliarios", "icon" => "FaWarehouse", "color" => "#31753d"],
        ]);
    }
}
