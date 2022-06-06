<x-layout>
    <x-slot:title>
        {{ "Ažuriranje vesti" }}
    </x-slot>

<form action="/update" 
      method="post" enctype="multipart/form-data" 
      class="login-form">
      @csrf
    <select name='category_id' required>
        <option value="{{$article->category->id}}">
            {{$article->category->name}}
        </option>
        @foreach ($categories as $category)
            @if($category->id !== $article->category->id)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endif
        @endforeach
    </select>
    <div class="checkbox-container">
        @foreach($towns as $index => $town)
            <div class="checkbox-item">
                <input type="checkbox" 
                        id="town_{{ $index + 1 }}" 
                        name="town_{{ $index + 1 }}" 
                        value="{{ $town->id }}"
                        @foreach ($article->towns as $article_town)
                        @if ($town->id == $article_town->id)
                            checked
                        @endif    
                        @endforeach
                        >
                <label for="town_{{ $index + 1 }}">
                    {{ $town->name }}
                </label>
            </div>
        @endforeach
    </div>
    <input type="text" name="title" required 
           value="{{ $article->title }}"
           placeholder="Unesite naslov vesti">
    <label for="photo" class="custom-photo-upload" >
        Postavi fotografiju
    </label>
    <input type="file" id="photo" name="photo" accept="image/*" 
           required value="{{ $article->photo }}">
    <textarea name="abstract" placeholder="Unesite apstrakt vesti" 
           required rows="7">{{ $article->extract }}</textarea>
    <textarea name="body" placeholder="Unesi telo vesti" 
              required rows="32">{{ $article->body }}</textarea>
    <input type="submit" value="Ažuriraj vest">
</form>
</x-layout>