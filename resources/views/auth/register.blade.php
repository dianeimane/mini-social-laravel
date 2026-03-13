
<style>body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.register-container {
    text-align: center;
}

.register-container h2 {
    color: #28a745;
    font-weight: 600;
    font-size: 28px;
    margin-bottom: 25px;
}

/* Form card */
form {
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 320px;
    margin: 0 auto; /* center form */
}

/* Inputs */
form input[type="text"],
form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: border 0.3s;
}

form input[type="text"]:focus,
form input[type="email"]:focus,
form input[type="password"]:focus {
    border-color: #28a745;
    outline: none;
}

/* Button */
form button {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.1s;
}

form button:hover {
    background-color: #218838;
    transform: scale(1.03);
}

/* Error message */
form p.error {
    color: red;
    text-align: center;
    margin-top: 10px;
    font-weight: bold;
}</style>





<form method="POST" action="/register">
@csrf

<input type="text" name="name" placeholder="Name">
<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button type="submit">Register</button>

        <!-- Errors -->
        @error('name')
            <p class="error">{{ $message }}</p>
        @enderror
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror
</form>