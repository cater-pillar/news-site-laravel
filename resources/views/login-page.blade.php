<x-layout >
    <x-slot:title>
        {{ "Prijava" }}
    </x-slot>
    
    
    <form action="/login" method="post" class="login-form">
        @csrf
        <input type="text" name="name" placeholder="Korisničko ime ili email" required>
        <input type="password" name="password" placeholder="Lozinka" required>
        <input type="checkbox" name="keep" id="keep">
        <label for="keep">Ostavi me prijavljenog</label>
        <input type="submit" value="Prijavi se">
    </form>
    <p class="login-page">Nemate nalog? <a href="#">Otvorite ga</a></p>
</x-layout>