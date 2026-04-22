<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkillSwap - Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo"><i class="fas fa-sync-alt"></i> SkillSwap</div>
        <ul class="nav-links">
            <li><a href="index.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>

    <div class="hero-text">
        <h1>Welcome Back</h1>
        <p>Login to continue swapping skills.</p>
    </div>

    <div class="login-container">
        <h2><i class="fas fa-lock"></i> Login</h2>
            <form action="login.php" method="POST"> 
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Enter Platform</button>
        </form>
        <p style="text-align:center; margin-top:15px;">New? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
