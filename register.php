<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="register-container">
        <h1>Create Account</h1>
        <p class="subtitle">Join the Computer Lab Reservation System</p>

        <form action="register_process.php" method="POST">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name"
                   placeholder="Enter your full name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email"
                   placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Create a password" required>

            <button type="submit">Create Account</button>
        </form>

        <p class="login-link">
            Already have an account?
            <a href="login.php">Login</a>
        </p>
    </div>

</body>
</html>