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
        ClassLanguagelink::create([
            'ClassID' => 'HTML'
            ,'ClassLanguageID' => ''
        ]);

        ClassLanguagelink::create([
            'ClassID' => 'CSS'
            ,'ClassLanguageID' => ''
        ]);

        ClassLanguagelink::create([
            'ClassID' => 'JavaScript'
            ,'ClassLanguageID' => ''
        ]);

        ClassLanguagelink::create([
            'ClassID' => 'PHP'
            ,'ClassLanguageID' => ''
        ]);

        ClassLanguagelink::create([
            'ClassID' => 'JAVA'
            ,'ClassLanguageID' => ''
        ]);

        ClassLanguagelink::create([
            'ClassID' => 'DataBase'
            ,'ClassLanguageID' => ''
        ]);
    }
}
