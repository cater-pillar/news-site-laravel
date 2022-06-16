<x-layout >
    <x-slot:title>
        {{ "Naslovna" }}
    </x-slot>
        @if (count($articles) > 0)
        <div class="main-article">
            <x-article-card :article="$articles[0]" 
                            type="main-article" />
        </div>
        <div class="horizontal-banner-red"></div>
        <ul class="articles-list">
            @foreach ($articles as $index => $article)
                @if ($index !== 0)
                    <li class="articles-list-item">
                        <x-article-card :article="$article" 
                                        type="articles-list" />
                    </li>
                @endif
            @endforeach
        </ul>
        @else 
            <p class="no-article">
                Nijedna vest ne odgovara pretrazi
            </p>
        @endif
        <div class="horizontal-banner-red"></div>
        <x-success/>
</x-layout>