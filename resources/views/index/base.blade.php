<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jev</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<header>
    <div class="container">
        <a href="/" class="header_logo"><img src="/backgrounds/logo.png" alt=""></a>
        <ul class="header_nav">
            <li class=" @if(URL::current() == url('/')) active @endif "><a href="/">Главная</a></li>
            <li class=" @if(URL::current() == url('/shop')) active @endif "><a href="/shop">Магазин</a></li>
            <li class=" @if(URL::current() == url('/gallery')) active @endif "><a href="/gallery">Галлерея</a></li>
            <li class=" @if(URL::current() == url('/blog')) active @endif "><a href="/blog">Блог</a></li>
            <li class=" @if(URL::current() == url('/about')) active @endif "><a href="/about">Обо мне</a></li>
            <li class=" @if(URL::current() == url('/contacts')) active @endif "><a href="/contacts">Контакты</a></li>
        </ul>
    </div>
</header>
<div class="container">
    @yield('content')
</div>
<footer>
    <div class="container">
        <ul class="footer_social">
            <li class="footer_social instagramm"><a href="#"></a></li>
            <li class="footer_social fb"><a href="#"></a></li>
            <li class="footer_social vk"><a href="#"></a></li>
        </ul>
    </div>

</footer>
</body>
</html>