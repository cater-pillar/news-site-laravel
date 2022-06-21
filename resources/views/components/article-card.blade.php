@props(['article', 'type'])

<div class="{{$type}}-img">
    <img src="../storage/{{  $article->photo }}">
</div>
<div class="{{$type}}-body">
    <div>
        {{ $article->category->name }}
        <x-edit-delete :id="$article->id" link="article"/>
    </div>
    <h1>
        <a class="title-color" 
            href="/article/{{ $article->slug }}">
            {{ $article->title }}
        </a>
    </h1>
    <p class="{{$type}}-abstract">
        {{ $article->extract }}
    </p>
    <div class="breadcrumbs">
        <a  href="/article/{{ $article->slug }}" 
            class="article-link">
            detaljnije
        </a>
        <a  href="/article/{{ $article->slug }}" 
            class="comments-link">
            <img class="speech-bubble" 
                 src="/images/speech-bubble.png">
                {{ $article->comments_count }}
        </a>
    </div>
</div>
