<h5>
    Otvorite nalog da biste postavili komentar:
</h5>
<form action="/register" 
        method="post" class="login-form">
        @csrf
    <input type="text" name="name" 
            placeholder="Korisničko ime">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" 
            placeholder="Lozinka">
    <input type="submit" value="Otvori nalog">
</form>
<p>Već imate nalog? <a href="/login-page">Prijavite se</a></p>