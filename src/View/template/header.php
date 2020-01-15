<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>부산 국제모터쇼</title>
    <script src="/js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <div id="top">
        <div class="inner">
            <div class="d-flex">
                <div class="info w-60">
                    <p>TEL : (051)740-3520, 3516  ｜  FAX : (051)740-3404   |   E-mail : bimos@bexco.co.kr </p>
                </div>  
                <div class="sns w-40 d-flex flex-row-reverse align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM164 356c-55.3 0-100-44.7-100-100s44.7-100 100-100c27 0 49.5 9.8 67 26.2l-27.1 26.1c-7.4-7.1-20.3-15.4-39.8-15.4-34.1 0-61.9 28.2-61.9 63.2 0 34.9 27.8 63.2 61.9 63.2 39.6 0 54.4-28.5 56.8-43.1H164v-34.4h94.4c1 5 1.6 10.1 1.6 16.6 0 57.1-38.3 97.6-96 97.6zm220-81.8h-29v29h-29.2v-29h-29V245h29v-29H355v29h29v29.2z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 80v352c0 26.5-21.5 48-48 48h-85.3V302.8h60.6l8.7-67.6h-69.3V192c0-19.6 5.4-32.9 33.5-32.9H384V98.7c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9H184v67.6h60.9V480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"/></svg>
                </div>
            </div>
        </div>
    </div>
    <div id="header">
        <div class="inner">
            <a href="/" class="logo">
                <img src="/images/logo.png" alt="부산국제모터쇼" height="90">
            </a>
            <div class="main-nav">
                <div class="nav-item">
                    <a href="/">부산국제모터쇼</a>
                    <div class="inner-nav">
                        <a href="/festival-info">행사소개</a>
                        <a href="/festival-history">모터쇼 연혁</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="/reserve">예매하기</a>
                </div>
                <div class="nav-item">
                    <a href="/booth-map">관람안내</a>
                    <div class="inner-nav">
                        <a href="/booth-map">부스배치도</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="/admi/site-manage">관리자</a>
                    <div class="inner-nav">
                        <a href="/admin/site-manage">사이트관리자</a>
                        <a href="/admin/booth-application">부스신청</a>
                    </div>
                </div>
            </div>
            <div class="sub-nav">
                <?php if(!user()):?>
                <div class="nav-item">
                    <a href="/users/login">로그인</a>
                </div>
                <div class="nav-item">
                    <a href="/users/join">회원가입</a>
                </div>
                <?php else: ?>
                <div class="nav-item">
                    <a href="/users/logout">로그아웃</a>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="visual<?=isset($_GET['url']) ? " sub" : ""?>">
        <div class="v-images">
            <div class="image"></div>
            <div class="image"></div>
            <div class="image"></div>
        </div>
        <div class="v-contents">
            <div>
                <h5><span class="text-accent text-lightblue">미래</span>를 향한 <span class="text-accent text-bluegreen">모빌리티</span>의 혁신적인 비전</h5>
                <h1>BIMOS 2020</h1>
                <p>2020년 5월 28일 (목) BEXCO 전관</p>
            </div>
        </div>
    </div>