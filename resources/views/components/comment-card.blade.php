@props(['comment'])
<li class="comment-user">
    <x-edit-delete :link_id="$comment->id" 
                   :user_id="$comment->user->id" 
                   link="comments"/>
    <img src="../images/user.png" alt="user"/>
    <div>
        <h3>
             {{ $comment->user->name }} 
        </h3>
        <span>
            {{ $comment->created_at->format("H:i, d.m.Y") }}
        </span>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</li> 