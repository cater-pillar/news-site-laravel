@props(['comment'])
<li class="comment-user">
    <img src="../images/user.png" alt="user"/>
    <div>
        <h3>
             {{ $comment->user }} 
        </h3>
        <span>{{ $comment->published_at }}</span>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</li> 