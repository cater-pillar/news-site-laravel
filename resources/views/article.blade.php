<x-layout >
    <x-slot:title>
        {{ $article->title }}
    </x-slot>
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        {{ "Vesti | ". $article->title }}
    </div>
    @if($article)
        <x-article-full :article="$article" />
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
                    <x-comment-card :comment="$comment" />   
                @endforeach
            </ul>
        @endif
        @if(isset($_SESSION['user']))
            @include('_post-comment')
        @else
            @include('_register')
        @endif
    @endif
</x-layout>