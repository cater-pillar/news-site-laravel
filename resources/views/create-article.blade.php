<x-layout >
    <x-slot:title>
        {{ "Dodaj novu vest" }}
    </x-slot>
        <form action="store" 
            method="post" enctype="multipart/form-data" 
            class="login-form">
            @csrf
            <select name='category_id' required>
                <option value="">Odaberi kategoriju</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <div class="checkbox-container">
                @foreach($towns as $index => $town)
                    <div class="checkbox-item">
                        <input type="checkbox" 
                               id="town_{{ $index + 1 }}" 
                               name="town_{{ $index + 1 }}" 
                               value="{{ $town->id }}">
                        <label for="town_{{ $index + 1 }}">
                            {{ $town->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <input type="text" name="title" required
                placeholder="Unesite naslov vesti">
            <label for="photo" class="custom-photo-upload">
                Postavi fotografiju
            </label>
            <input type="file" id="photo" 
                   name="photo" accept="image/*" 
                   required>
            <textarea name="extract" required
                      placeholder="Unesite apstrakt vesti"></textarea>
            <textarea name="body" required
                      placeholder="Unesi telo vesti"></textarea>
            <input type="submit" value="Prosledi novu vest">
        </form>
</x-layout>