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
    <nav>
        <div class="nav-primary">
            <div class="main-container">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href='../home/index.php' class='nav-link'>NASLOVNA</a>
                    </li>
                    @foreach ($towns as $town)
                        <li class="nav-item">
                            <a href='#' 
                            class='nav-link'>
                            {{ $town->name }} 
                        </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="nav-secondary">
            <div class="main-container">
            <ul class="nav-list">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a href='#' 
                           class='nav-link'>
                        {{ $category->name }} 
                    </a></li>
                @endforeach
            </ul>
            </div>
        </div>
    </nav>
</header>
<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Ovde treba da ide naslov strane.
    </div>

    <div class="main-article">
        <div class="main-article-img">
            <img src="../neka_fotka">
        </div>
        <div class="main-article-body">
            <p>
                Grad ili kategorija.
            </p>
            <h1>
                <a class="title-color" 
                   href="#">
                    Naslov clanka
                </a>
            </h1>
            <p class="main-article-abstract">
                Apstract clanka
            </p>
            <div class="breadcrumbs">
                <a href="#" class="article-link">detaljnije ></a>
                <a href="#" class="comments-link">
                    <img class="speech-bubble" src="../images/speech-bubble.png">#
                </a>
            </div>
        </div>
    </div>
    <div class="horizontal-banner-red"></div>
    <ul class="articles-list">

        <li class="articles-list-item">
        <div class="articles-list-img">
            <img src="../neka_fotka.png">
        </div>
        <div class="articles-list-body">
            <p>
                Grad ili kategorija
            </p>
            <h1>
                <a class="title-color" 
                   href="#">
                    Naslov clanka
                </a>
            </h1>
            <p class="articles-list-abstract">
                Abstract clanka
            </p>
            <div class="breadcrumbs">
                <a href="#" class="article-link">detaljnije ></a>
                <a href="#" class="comments-link">
                    <img class="speech-bubble" src="../images/speech-bubble.png">#
                </a>
            </div>
        </div>
        
        </li>
    </ul>
    <div class="horizontal-banner-red"></div>
<footer>
    <img src="../images/newspaper-red.png" alt="logo" class="logo-footer">
    <span class="text-footer">Vesti, Internet novine - Sva prava zadržana ©</span>
</footer>
</div>
</body>