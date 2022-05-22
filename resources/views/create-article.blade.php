<x-layout >
    <x-slot:title>
        {{ "Dodaj novu vest" }}
    </x-slot>
        <form action="#" 
            method="post" enctype="multipart/form-data" 
            class="login-form">
            @csrf
            <select name='category' required>
                <option value="">Odaberi kategoriju</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <select name='town' required>
                <option value="">Odaberi grad</option>
                @foreach($towns as $town)
                    <option value="{{ $town->id }}">
                        {{ $town->name }}
                    </option>
                @endforeach
            </select>
            <input type="text" name="title" required
                placeholder="Unesite naslov vesti">
            <label for="photo" class="custom-photo-upload">
                Postavi fotografiju
            </label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            <textarea name="abstract" placeholder="Unesite apstrakt vesti" required></textarea>
            <textarea name="body" placeholder="Unesi telo vesti" required></textarea>
            <input type="submit" value="Prosledi novu vest">
        </form>
</x-layout>