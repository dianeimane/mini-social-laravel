<style>
/* ====== Body ====== */
body{
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background:#f4f7f8;
    margin:0;
    padding:20px;
}

/* ====== Create/Update Form ====== */
form.post-form{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

form.post-form input,
form.post-form textarea{
    width:100%;
    padding:10px;
    margin-bottom:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

form.post-form button{
    padding:8px 15px;
    border:none;
    border-radius:8px;
    background:#007bff;
    color:white;
    cursor:pointer;
}

form.post-form button:hover{
    background:#0056b3;
}

/* ====== Posts Grid ====== */
.posts-container{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    justify-content:center;
}

/* ====== Post Card ====== */
.post-card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
    transition:0.3s;
    width: calc(33.333% - 20px);
    box-sizing: border-box;
}

.post-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

/* ====== Titles & Content ====== */
.post-title{
    font-size:20px;
    font-weight:bold;
    color:#007bff;
    margin-bottom:10px;
}

.post-content{
    margin-bottom:10px;
}

.likes{
    font-weight:bold;
    margin-bottom:10px;
}

/* ====== Buttons ====== */
.update-btn, .logout-btn, .delete-btn, .like-btn{
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
    border:none;
    cursor:pointer;
    margin-right:5px;
}

.update-btn{
    background:#ff0080;
    color:white;
}
.update-btn:hover{ background:#cc0066; }

.delete-btn{
    background:#dc3545;
    color:white;
}
.delete-btn:hover{ background:#a71d2a; }

.like-btn{
    background:#007bff;
    color:white;
}
.like-btn:hover{ background:#0056b3; }

.logout-btn{
    background:#28a745;
    color:white;
    margin-bottom:20px;
}
.logout-btn:hover{ background:#218838; }

/* ====== Responsive ====== */
@media (max-width:900px){
    .post-card{ width: calc(50% - 20px); }
}
@media (max-width:600px){
    .post-card{ width: 100%; }
}
</style>
<a class="logout-btn" href="/logout">Logout</a>


<h2> Create Post</h2>


<form class="post-form"  action="{{ route('posts.store') }}" method="POST">
    @csrf
   

    <input type="text" name="title" placeholder="Title" value="{{ old('title', $postToEdit->title ?? '') }}">
    <textarea name="content" placeholder="Content">{{ old('content', $postToEdit->content ?? '') }}</textarea>

    <button type="submit">Add Post</button>
</form>

<div class="posts-container">
@foreach($posts as $post)
<div class="post-card">
    <div class="post-title">{{ $post->title }}   {{ $post->content }}</div>
    <div class="likes">❤️ Likes: {{ $post->likes->count() }}</div>

    @if($post->user_id == session('user_id'))
        <a class="update-btn" href="{{ route('posts.edit', $post->id) }}">Update</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">Delete</button>
        </form>
    @endif

    <form method="POST" action="{{ route('posts.like',$post->id) }}" style="display:inline">
        @csrf
        @if($post->likes->contains('user_id', session('user_id')))
            <button type="submit" class="like-btn">Unlike</button>
        @else
            <button type="submit" class="like-btn">Like</button>
        @endif
    </form>
</div>
@endforeach
</div>