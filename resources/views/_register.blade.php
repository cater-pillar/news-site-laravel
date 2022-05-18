<h5>
    Otvorite nalog da biste postavili komentar:
</h5>
<form action="/register" 
        method="post" class="login-form">
        @csrf
    <input type="text" name="name" value="{{ old("name") }}"
            placeholder="Korisničko ime">
        @error("name")
                <p class="error-msg">Korisničko ime mora sadržati najmanje 3 karaktera</p>
        @enderror
    <input type="email" name="email" value="{{ old("email") }}" 
           placeholder="Email">
        @error("email")
                <p class="error-msg">Neophodno je uneti ispravnu, jedinstvenu email adresu</p>
        @enderror
    <input type="password" name="password" 
            placeholder="Lozinka">
        @error("password")
            <p class="error-msg">Lozinka mora sadržati najmanje 3 karaktera</p>
        @enderror
    <input type="submit" value="Otvori nalog">
</form>
<p>Već imate nalog? <a href="/login">Prijavite se</a></p>