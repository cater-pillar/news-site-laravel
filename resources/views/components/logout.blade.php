@props(['type'])
<form action="/logout" method="post" 
      class="logout-form-{{ $type }}">
    @csrf
 <input type="submit" value="Odjavi me" 
        class="logout-submit-{{ $type }}"/>
</form> 