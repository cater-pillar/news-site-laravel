<h5 id="comment">
    Pošalji komentar:
</h5>
<form action="../data/new_comment.php" 
      method="post" 
      class="login-form">
    <input row="5" type="text" 
           name="comment" placeholder="Komentar">
    <input class="hidden-input" name="article_id" 
           value="" type="text" >
    <input class="hidden-input" name="user_id" 
           value={{ auth()->user()->id }} type="text" >
    <input type="submit" value="Pošalji">
</form>
<form action="/logout" method="post" class="logout-form">
       @csrf
    <input type="submit" value="Odjavi me" class="logout-submit"/>
</form>