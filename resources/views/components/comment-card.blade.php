@props(['comment'])
<li class="comment-user">
    <img src="../images/user.png" alt="user"/>
    <div>
        <h3>
             {{ $comment->user->name }} 
        </h3>
        <span>{{ $comment->created_at }}</span>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</li> 