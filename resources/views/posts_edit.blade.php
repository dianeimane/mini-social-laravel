<style>body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f8;
    color: #333;
    margin: 0;
    padding: 20px;
}

/* ====== Form Container ====== */
form {
    max-width: 600px;
    margin: 40px auto; 
    background: #fff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}

/* ====== Form Inputs ====== */
form input[type="text"],
form textarea {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border 0.3s, box-shadow 0.3s;
}

form input[type="text"]:focus,
form textarea:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0,123,255,0.3);
    outline: none;
}

/* ====== Button ====== */
button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
}

button:hover {
    background-color: #0056b3;
    transform: scale(1.03);
}

button:disabled {
    background-color: #aaa;
    cursor: not-allowed;
}

/* ====== Heading ====== */
h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 25px;
}

/* ====== Responsive ====== */
@media screen and (max-width: 650px) {
    form {
        padding: 20px;
    }
}</style>

<h2>Update Post</h2>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="text" name="title" value="{{ $post->title }}">
    <textarea name="content">{{ $post->content }}</textarea>
    <button type="submit">Update Post</button>
</form>