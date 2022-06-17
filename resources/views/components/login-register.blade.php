@props(['is_login'])

<h5>
    {{ $is_login ? "Prijavite se" : "Otvorite nalog" }} da biste postavili komentar:
</h5>

<form action={{ $is_login ? "/login/store" : "/register/store" }} 
      method="post" class="login-form">
      @csrf

    @if (!$is_login)
        <input type="text" name="name" 
               value="{{ old("name") }}"
               placeholder="Korisničko ime" 
               required>
        @error("name")
                <p class="error-msg">
                    Korisničko ime mora sadržati najmanje 3 karaktera
                </p>
        @enderror
    @endif

    <input type="email" name="email" 
           value="{{ old("email") }}" 
           placeholder="Email" required>
    @error("email")
            <p class="error-msg">
                Neophodno je uneti ispravnu, jedinstvenu email adresu
            </p>
    @enderror

    <input type="password" name="password" 
           placeholder="Lozinka">
    @error("password")
        <p class="error-msg">
            Lozinka mora sadržati najmanje 3 karaktera
        </p>
    @enderror

    <input type="checkbox" name="keep" id="keep">
    <label for="keep">
        Ostavi me prijavljenog
    </label>

    <input type="submit" value="Otvori nalog">

</form>

<p>{{ $is_login ? "Nemate nalog?" : "Već imate nalog?" }}
    <a href={{ $is_login ? "/register/create" : "/login/create" }}>
        {{ $is_login ? "Otvorite ga" : "Prijavite se" }}
    </a>
</p>

