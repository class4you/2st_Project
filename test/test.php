<?php
function generateRandomBirthday() {
    // 현재 날짜
    $currentDate = new DateTime();

    // 최소 나이 및 최대 나이 설정
    $minAge = 10;
    $maxAge = 100;

    // 나이에 따른 최소 및 최대 태어난 해 계산
    $minBirthYear = $currentDate->format('Y') - $maxAge;
    $maxBirthYear = $currentDate->format('Y') - $minAge;

    // 랜덤으로 태어난 해 선택
    $randomBirthYear = mt_rand($minBirthYear, $maxBirthYear);

    // 랜덤으로 태어난 월 및 일 선택
    $randomBirthMonth = mt_rand(1, 12);
    $randomBirthDay = mt_rand(1, 28); // 간단하게 28일까지로 가정

    // 랜덤으로 생성된 생년월일을 날짜 형식으로 반환
    return sprintf('%04d-%02d-%02d', $randomBirthYear, $randomBirthMonth, $randomBirthDay);
}

// 테스트
for ($i = 0; $i < 10; $i++) {
    echo generateRandomBirthday() . PHP_EOL;
}
?>