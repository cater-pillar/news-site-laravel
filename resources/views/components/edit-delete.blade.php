@props(['id', 'user_id' => false, 'link'])
@if(auth()->user()?->is_admin || auth()->user()?->id === $user_id)
    <a href="/{{ $link }}/{{ $id }}/edit"
        class="delete-edit-link" title="edit">
        <img src="/images/edit.png" alt="edit" 
            class="delete-edit-img">
    </a>
    <form action="/{{ $link }}/{{ $id }}/destroy" 
          method="post" 
          class="delete-edit-form">
        @csrf
        <button class="delete-edit-btn">
        <img src="/images/delete.png" alt="delete" 
            class="delete-edit-img">
        </button>
    </form> 
@endif