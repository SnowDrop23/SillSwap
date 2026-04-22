<?php
session_start();
include 'db_config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, role FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true);

            $_SESSION['user_id']  = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role']     = $row['role'];

            //ADMIN LOGIN -> Redirect to Admin Folder
            if ($row['role'] === 'admin') {
                $_SESSION['admin_login'] = true;
                header("Location: admin/dashboard.php");
                exit();
            } 
            
            // NORMAL USER LOGIN -> Redirect to Dashboard
            else {
                $_SESSION['admin_login'] = false;
                header("Location: dashboard.php"); 
                exit();
            }

        } else {
            $error = "❌ Invalid password!";
        }
    } else {
        $error = "❌ No user found with that username!";
    }
}
?>
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
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
</nav>

<div class="hero-text">
    <h1>Welcome Back</h1>
    <p>Login to continue swapping skills.</p>
</div>

<div class="login-container">
    <h2><i class="fas fa-lock"></i> Login</h2>
    <?php if (!empty($error)): ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Enter Platform</button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        New? <a href="register.php">Register here</a>
    </p>
</div>
</body>
</html>
