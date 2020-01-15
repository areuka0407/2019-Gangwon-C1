<?php

    function graph($total, $reserveCount){
        

        // 준비
        $image = imagecreatetruecolor(500, 400);
        
        $white = imagecolorallocate($image, 255, 255, 255);
        $gray = imagecolorallocate($image, 238, 238, 238);
        $black = imagecolorallocate($image, 32, 32, 32);
        $blue = imagecolorallocate($image, 51, 100, 166);

        imagefilledrectangle($image, 0, 0, 500, 400, $white);

        $percent = $reserveCount * 100 / $total;
        $angle = 360 * $reserveCount / $total;

        // 전체 인원
        imagefilledarc($image, 200, 200, 250, 250, $angle, 360, $gray, IMG_ARC_PIE);

        // 예약 인원
        $reserveCount > 0 && imagefilledarc($image, 200, 200, 250, 250, 0, $angle, $blue, IMG_ARC_PIE);

        // 캡션
        imagefilledrectangle($image, 345, 37, 360, 52, $gray);
        imagefilledrectangle($image, 345, 63, 360, 78, $blue);

        $font_file = __PUBLIC.DS."fonts/NanumSquareR.ttf";
        imagettftext($image, 10, 0, 370, 50, $black, $font_file, "참관가능 인원: {$total}명");
        imagettftext($image, 10, 0, 370, 75, $black, $font_file, "예매 인원: {$reserveCount}명");
        imagettftext($image, 10, 0, 370, 100, $black, $font_file, "예매율(%): {$percent}%");
        

        header("Content-Type: image/jpeg");
        imagejpeg($image);
    }