<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvestimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('investiment')->insert([
                [
                    "name_investiment" => "Nvidia®",
                    "current_investiment" => 0,
                    "session_id" => 1,
                    "default_color" => "#5a8a1d",
                    "default_icon" => "BsNvidia"
                ],
                [
                    "name_investiment" => "Amazon®",
                    "current_investiment" => 0,
                    "session_id" => 1,
                    "default_color" => "#e09b2b",
                    "default_icon" => "FaAmazon"
                ],
                [
                    "name_investiment" => "Apple Inc.®",
                    "current_investiment" => 0,
                    "session_id" => 1,
                    "default_color" => "#424242",
                    "default_icon" => "FaApple"
                ],
                [
                    "name_investiment" => "Microsoft",
                    "current_investiment" => 0,
                    "session_id" => 1,
                    "default_color" => "#0064a3",
                    "default_icon" => "FaMicrosoft"
                ],
                [
                    "name_investiment" => "Bitcoin",
                    "current_investiment" => 0,
                    "session_id" => 2,
                    "default_color" => "#f2a40e",
                    "default_icon" => "FaBitcoin"
                ],
                [
                    "name_investiment" => "Ethereum",
                    "current_investiment" => 0,
                    "session_id" => 2,
                    "default_color" => "#4c4c4c",
                    "default_icon" => "FaEthereum"
                ],
                [
                    "name_investiment" => "HoneyBadgers",
                    "current_investiment" => 0,
                    "session_id" => 2,
                    "default_color" => "#e37124",
                    "default_icon" => "GiAnimalHide"
                ],
                [
                    "name_investiment" => "Satoshi",
                    "current_investiment" => 0,
                    "session_id" => 2,
                    "default_color" => "#5a5a5a",
                    "default_icon" => "LuJapaneseYen"
                ],
                [
                    "name_investiment" => "Matic",
                    "current_investiment" => 0,
                    "session_id" => 2,
                    "default_color" => "#6c4da4",
                    "default_icon" => "SiPolygon"
                ]
            ]);
    }
}
