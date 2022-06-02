@props(['article', 'type'])

<div class="{{$type}}-img">
    <img src="{{ asset("images/$article->photo") }}">
</div>
<div class="{{$type}}-body">
    <p>
        {{ $article->category->name }}
        @if(auth()->user())
        @if(auth()->user()->is_admin)
        <a href="/article/{{ $article->id }}/destroy"
           class="delete-edit-link" title="edit">
           <img src="/images/edit.png" alt="edit" class="delete-edit-img">
        </a>
        <a href="/article/{{ $article->id }}/destroy"
           class="delete-edit-link" title="delete">
           <img src="/images/delete.png" alt="delete" class="delete-edit-img">
        </a>
        @endif
        @endif
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
