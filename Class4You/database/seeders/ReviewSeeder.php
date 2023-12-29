<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $date = $faker->dateTimeBetween('-1 years');
            $rating = $faker->numberBetween(1, 5);
            $enrollment = $faker->numberBetween(1, 249);

            Review::create([
                'EnrollmentID' => $enrollment,
                'ReviewComment' => <<<EOT
와....대박이에요. 파트 10까지 나와도 되고, 파트당 20만원씩 책정하셔도 다 구매할테니 제발 내용 덜어내거나 난이도 조절하지 마시고 자잘한 부분도 포기하지 말아주세요 ㅜㅠ 
얼마전에 수강생들에게 단체메일 보내셨던데 내용 굳이 안 덜어내셔도 깊이가 애매해지거나 하지않으니 걱정마시구 (보는 사람이 건너뛰면 되는 문제기도 하지만 정 신경쓰이시면 파트7 이후 외전으로 다루셔도 괜찮습니다..!) 
어디에도 이런 강의 없습니다. 저는 이만 팬티 갈아입으러 갑니다..
EOT,
                'ReviewRating' => $rating,
                'created_at' => $date,
            ]);

        }
    }
}
