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
        {{ "Vesti | ". $article->title }}
    </div>
    @if($article)
    <div class="single-article">
        <img class="single-article-image" src="../images/{{ $article->photo }}" >
        <div class="single-article-group">
            <div class="single-article-info">
                {{ $article->created_at }} | 
                {{ $article->category->name }} |
                 @foreach ($article->towns as $town) 
                    {{ $town->name }}
                 @endforeach
            </div>
            <h1 class="single-article-title"> {{ $article->title }}</h1>
            <p class="single-article-abstract">
                <strong>
                    {{ $article->extract }}
                </strong>
            </p>
        </div>
        <div class="single-article-body">
            {{ $article->body }}
        </div>
        
        
    </div>
    <div class="horizontal-banner-red"></div>
    <h2 class="h-comments">KOMENTARI</h2>
        <a class="span-comments" href="#comment">
            <img src="../images/draw.png" alt="user"/>    
            Pošalji komentar
        </a>
        <span class="span-comments">
            <img src="../images/speech-bubble-gray.png" alt="user"/>
            Komentari {{ count($article->comments) }} 
        </span>
    @if(count($article->comments) > 0)
    <ul class="list-comments">
        @foreach($article->comments as $comment)
            <li class="comment-user">
                <img src="../images/user.png" alt="user"/>
                <div>
                    <h3>
                         {{ $comment->user }} 
                    </h3>
                    <span>{{ $comment->published_at }}</span>
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>
            </li>    
        @endforeach
    </ul>
    @endif
    @if(isset($_SESSION['user']))
    <h5 id="comment">
        Pošalji komentar:
    </h5>
    <form action="../data/new_comment.php" 
          method="post" 
          class="login-form">
        <input row="5" type="text" 
               name="comment" placeholder="Komentar">
        <input class="hidden-input" name="article_id" 
               value="<?= $_GET['id']?>" type="text" >
        <input class="hidden-input" name="user_id" 
               value="<?= $_SESSION['user']?>" type="text" >
        <input type="submit" value="Pošalji">
    </form>
    <form action="../data/logout.php" class="logout-form">
        <input type="submit" value="Odjavi me" class="logout-submit"/>
    </form>
    @else
    <h5>
    Otvorite nalog da biste postavili komentar:
    </h5>
    <form action="#" 
          method="post" class="login-form">
        <input type="text" name="username" 
               placeholder="Korisničko ime">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" 
               placeholder="Lozinka">
        <input type="submit" value="Otvori nalog">
    </form>
    <p>Već imate nalog? <a href="../login/">Prijavite se</a></p>
    @endif
    @endif
    <footer>
        <img src="../images/newspaper-red.png" alt="logo" class="logo-footer">
        <span class="text-footer">Vesti, Internet novine - Sva prava zadržana ©</span>
    </footer>
</div>
</body>