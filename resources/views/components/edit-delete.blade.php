@props(['id'])
@if(auth()->user())
@if(auth()->user()->is_admin)
    <a href="/article/{{ $id }}/edit"
        class="delete-edit-link" title="edit">
        <img src="/images/edit.png" alt="edit" 
            class="delete-edit-img">
    </a>
    <form action="/article/{{ $id }}/destroy" method="post" 
            class="delete-edit-form">
        @csrf
        <button class="delete-edit-btn">
        <img src="/images/delete.png" alt="delete" 
            class="delete-edit-img">
        </button>
    </form> 
@endif
@endif