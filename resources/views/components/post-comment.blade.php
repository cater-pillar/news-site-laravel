@props(['id'])
<h5 id="comment">
    Pošalji komentar:
</h5>
<form action="/article/{{$id}}/comments" 
      method="post" 
      class="login-form">
      @csrf
    <input row="5" type="text" id="comment" required
           name="comment" placeholder="Komentar">
       @error('comment')
              <p class="error-msg">{{ $message }}</p>
       @enderror
    <input type="submit" value="Pošalji">
</form>
<form action="/logout" method="post" class="logout-form">
       @csrf
    <input type="submit" value="Odjavi me" class="logout-submit"/>
</form>