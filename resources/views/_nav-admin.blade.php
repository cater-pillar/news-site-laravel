@if(auth()->user()?->is_admin)
<div class="nav-admin">
    <div class="main-container">
        Dobrodošao admine | 
        <a href="/article/create">
            Dodaj novu vest
        </a> | <x-logout type="admin" />
    </div>
</div>
@endif