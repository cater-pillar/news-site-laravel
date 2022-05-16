<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesti | {{ $title }}</title>
    <link rel="icon" href={{ URL::asset('images/newspaper-red.png'); }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('style.css'); }} >
</head>
<body>
</html>
<header>
    <div class="head">
        <div class="search">
        <div class="main-container">
            <form action="/" method="get">
                <input type="text" name="search" placeholder="Traži">
            </form>
        </div>
        </div>
        <div class="main-container">
            <img src="../images/newspaper.png" alt="logo" class="logo">
            
        </div>
    </div>
    <x-nav />
</header>
<div class="main-container">

    {{ $slot }}

<footer>
    <img src="../images/newspaper-red.png" alt="logo" class="logo-footer">
    <span class="text-footer">Vesti, Internet novine - Sva prava zadržana ©</span>
</footer>
</div>
</body>
