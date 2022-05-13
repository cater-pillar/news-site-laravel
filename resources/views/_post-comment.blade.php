<h5 id="comment">
    Pošalji komentar:
</h5>
<form action="../data/new_comment.php" 
      method="post" 
      class="login-form">
    <input row="5" type="text" 
           name="comment" placeholder="Komentar">
    <input class="hidden-input" name="article_id" 
           value="<?= $_GET['id']?>" type="text" >
    <input class="hidden-input" name="user_id" 
           value="<?= $_SESSION['user']?>" type="text" >
    <input type="submit" value="Pošalji">
</form>
<form action="../data/logout.php" class="logout-form">
    <input type="submit" value="Odjavi me" class="logout-submit"/>
</form>