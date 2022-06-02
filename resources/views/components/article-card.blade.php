@props(['article', 'type'])

<div class="{{$type}}-img">
    <img src="/images/{{ $article->photo }}">
</div>
<div class="{{$type}}-body">
    <p>
        {{ $article->category->name }}
    </p>
    <h1>
        <a class="title-color" 
            href="/article/{{ $article->id }}">
            {{ $article->title }}
        </a>
    </h1>
    <p class="{{$type}}-abstract">
        {{ $article->extract }}
    </p>
    <div class="breadcrumbs">
        <a href="/article/{{ $article->id }}" class="article-link">detaljnije ></a>
        <a href="/article/{{ $article->id }}" class="comments-link">
            <img class="speech-bubble" src="/images/speech-bubble.png">{{ $article->comments->count() }}
        </a>
    </div>
</div>
