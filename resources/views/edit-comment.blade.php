<x-layout>
    <x-slot:title>
        {{ "Ažuriranje komentara" }}
    </x-slot>

<form action={{ url("comments/$comment->id/update")}} 
      method="post" enctype="multipart/form-data" 
      class="login-form">
      @csrf

    <input type="text" name="body" required 
           value="{{ $comment->body }}"
           placeholder="Unesite komentar">
    @error("body")
        <p class="error-msg">{{ $message }}</p>
    @enderror
    <input type="submit" value="Ažuriraj komentar">
</form>
</x-layout>