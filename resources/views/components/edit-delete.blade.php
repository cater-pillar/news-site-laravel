@props(['link_id', 'user_id' => false, 'link'])
@if(auth()->user()?->is_admin || auth()->user()?->id === $user_id)
    <a href="/{{ $link }}/{{ $link_id }}/edit"
        class="delete-edit-link" title="edit">
        <img src="/images/edit.png" alt="edit" 
            class="delete-edit-img">
    </a>
    <form action="/{{ $link }}/{{ $link_id }}/destroy" 
          method="post" 
          class="delete-edit-form">
        @csrf
        <button class="delete-edit-btn">
        <img src="/images/delete.png" alt="delete" 
            class="delete-edit-img">
        </button>
    </form> 
@endif