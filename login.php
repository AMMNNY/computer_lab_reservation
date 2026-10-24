<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="register-container">
        <h1>Welcome Back</h1>
        <p class="subtitle">Login to your Computer Lab Reservation System</p>

        <form action="login_process.php" method="POST">

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
                required
            >

            <button type="submit">Login</button>

        </form>

        <p class="login-link">
            Don't have an account?
            <a href="register.php">Create Account</a>
        </p>
    </div>

</body>
</html>