<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassLanguagelink;


class ClassLanguagelinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cnt = 1;
        while($cnt <= 17) {
            ClassLanguagelink::create([
                'ClassID' => $cnt
                ,'ClassLanguageID' => 1
            ]);
            $cnt++;
        }

        $cnt = 18;
        while($cnt <= 33) {
            ClassLanguagelink::create([
                'ClassID' => $cnt
                ,'ClassLanguageID' => 2
            ]);    
            $cnt++;
        }

        $cnt = 34;
        while($cnt <= 49) {
            ClassLanguagelink::create([
                'ClassID' => $cnt
                ,'ClassLanguageID' => 3
            ]);
            $cnt++;
        }

        $cnt = 50;
        while($cnt <= 65) {
            ClassLanguagelink::create([
                'ClassID' => $cnt
                ,'ClassLanguageID' => 4
            ]);
            $cnt++;
        }

        $cnt = 66;
        while($cnt <= 81) {
            ClassLanguagelink::create([
                'ClassID' => $cnt
                ,'ClassLanguageID' => 5
            ]);
            $cnt++;
        }

        $cnt = 82;
        while($cnt <= 97) {
            ClassLanguagelink::create([
                'ClassID' => $cnt
                ,'ClassLanguageID' => 6
            ]);
            $cnt++;
        }

    }
}
