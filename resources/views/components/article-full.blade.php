@props(['article'])
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