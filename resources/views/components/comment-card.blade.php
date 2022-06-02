@props(['comment'])
<li class="comment-user">
    @if(auth()->user())
    @if(auth()->user()->is_admin)
    <a href="#"
       class="delete-edit-link" title="edit">
       <img src="/images/edit.png" alt="edit" class="delete-edit-img">
    </a>
    <a href="#"
       class="delete-edit-link" title="delete">
       <img src="/images/delete.png" alt="delete" class="delete-edit-img">
    </a>
    @endif
    @endif
    <img src="../images/user.png" alt="user"/>
    <div>
        <h3>
             {{ $comment->user->name }} 
        </h3>
        <span>{{ $comment->created_at->diffForHumans() }}</span>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</li> 