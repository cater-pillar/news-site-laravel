<x-layout :towns="$towns" :categories="$categories">
    <x-slot:title>
        Naslovna strana
    </x-slot>
        <div class="horizontal-banner"></div>
        <div class="breadcrumbs">
            Ovde treba da ide naslov strane.
        </div>
        <div class="main-article">
            <x-article-card :article="$articles[0]" type="main-article" />
        </div>
        <div class="horizontal-banner-red"></div>
        <ul class="articles-list">
            @foreach ($articles as $index => $article)
                @if ($index !== 0)
                    <li class="articles-list-item">
                        <x-article-card :article="$article" type="articles-list" />
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="horizontal-banner-red"></div>
</x-layout>