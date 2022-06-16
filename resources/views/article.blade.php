<x-layout >
    <x-slot:title>
        {{ $article ? $article->title : "Vest nije nađena" }}
    </x-slot>
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
        @if(auth()->user())
            <x-post-comment :id="$article->id" />
        @else
            <x-login-register is_login=0 />
        @endif
    @endif
    <x-success/>
</x-layout>