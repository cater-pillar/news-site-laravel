<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesti | Dinamicni naslov strane</title>
    <link rel="icon" href={{ URL::asset('images/newspaper-red.png'); }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('style.css'); }} >
</head>
<body>
</html>
<header>
    <div class="head">
        <div class="search">
        <div class="main-container">
            <form action="../home/index.php" method="get">
                <input type="text" name="search" placeholder="Traži">
            </form>
        </div>
        </div>
        <div class="main-container">
            <img src="../images/newspaper.png" alt="logo" class="logo">
            
        </div>
    </div>
    <x-nav :towns="$towns" :categories="$categories" />
</header>


<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Ovde treba da ide naslov strane.
    </div>
    <div class="main-article">
        <x-article :article="$articles[0]" type="main-article" />
    </div>
    <div class="horizontal-banner-red">
    </div>
    <ul class="articles-list">
        @foreach ($articles as $index => $article)
        @if ($index !== 0)
        <li class="articles-list-item">
            <x-article :article="$article" type="articles-list" />
        </li>
        @endif
        @endforeach
    </ul>
    <div class="horizontal-banner-red">
    </div>
<footer>
    <img src="../images/newspaper-red.png" alt="logo" class="logo-footer">
    <span class="text-footer">Vesti, Internet novine - Sva prava zadržana ©</span>
</footer>
</div>
</body>