


<style>body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Container li fih h2 w form */
.login-container {
    text-align: center;
}




/* Form card */
form {
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 320px;
}
.message {
    text-align: center;
    margin-top: 15px;
    font-size: 15px;
    color: #333;
}

.message a {
    color: #764ba2;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
}

.message a:hover {
    color: #5a3a8c;
    text-decoration: underline;
}

/* Inputs */
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

form input[type="email"]:focus,
form input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Button */
form button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.1s;
}

form button:hover {
    background-color: #0056b3;
    transform: scale(1.03);
}

/* Error message */
form p.error {
    color: red;
    text-align: center;
    margin-top: 10px;
    font-weight: bold;
}
</style>

<form method="POST" action="/login">

@csrf

<input type="email" name="email" placeholder="email">

<input type="password" name="password" placeholder="password">

<button type="submit">Login</button>
<p class="message">
    Pas encore de compte ? 
    <a href="/register">Inscrivez-vous ici</a>
</p>

</form>