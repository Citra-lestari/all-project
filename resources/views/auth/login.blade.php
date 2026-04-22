<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Login</title>
    @vite('resources/css/dashboard.css')
</head>
<body class="auth-setting">
    <div class="container-auth">
        <h2>Log In</h2>

        <form action="/login" method="POST">
            @csrf
            <span class="container-input-auth">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="email">
            </span>

            <span class="container-input-auth">
                <label for="Password">Password</label>
                <input type="password" name="password" placeholder="Password">
            </span>

            <span class="container-forgot">
                <span class="remember">
                    <input type="checkbox">
                    Remember Me
                </span>
                <a href="">Forget Password?</a>
            </span>

            <button type="submit" class="btn-primary-auth">Sign In</button>
        </form>
    </div>
</body>
</html>
