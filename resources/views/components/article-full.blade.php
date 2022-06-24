@props(['article'])
<div class="single-article">
    <img class="single-article-image" 
         src="../storage/{{  $article->photo }}" >
    <div class="single-article-group">
        <div class="single-article-info">
            <span class="single-article-date">
            {{ $article->created_at->format("H:i, d.m.Y") }}
            </span>
             | 
            <span class="single-article-category">
            {{ $article->category->name }}
            </span>
             | 
            <img src="../images/pin.png" 
                     alt="location pin"
                     class="location-pin">
             @foreach ($article->towns as $town)
                <span class="single-article-town">
                {{ $town->name }}
                </span>
             @endforeach
        </div>
        <h1 class="single-article-title">
            {{ $article->title }}
        </h1>
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