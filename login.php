<?php 
require_once 'config/database.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Jenny's Glam</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0a0a0a, #1a1a2e);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-container {
            max-width: 450px;
            width: 100%;
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(12px);
            border-radius: 28px;
            border: 1px solid rgba(212,175,122,0.2);
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .logo {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff, #d4af7a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }
        h2 { text-align: center; color: #e8e0d8; font-family: 'Playfair Display', serif; margin-bottom: 0.5rem; }
        .subtitle { text-align: center; color: rgba(232,224,216,0.6); font-size: 0.85rem; margin-bottom: 2rem; }
        .form-group { margin-bottom: 1.2rem; }
        label { display: block; color: #e8e0d8; font-size: 0.8rem; margin-bottom: 0.5rem; letter-spacing: 1px; }
        input {
            width: 100%;
            padding: 0.9rem 1rem;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(212,175,122,0.2);
            border-radius: 12px;
            color: #e8e0d8;
            font-size: 0.9rem;
        }
        input:focus { outline: none; border-color: #d4af7a; box-shadow: 0 0 10px rgba(212,175,122,0.2); }
        .btn-login {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            border: none;
            border-radius: 30px;
            color: #0a0a0a;
            font-weight: 700;
            cursor: pointer;
            margin-top: 0.5rem;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(212,175,122,0.3); }
        .register-link { text-align: center; margin-top: 1.5rem; color: rgba(232,224,216,0.6); font-size: 0.85rem; }
        .register-link a { color: #d4af7a; text-decoration: none; font-weight: 600; }
        .error { background: rgba(255,0,0,0.1); border-left: 3px solid #ff4444; padding: 0.8rem; border-radius: 8px; margin-bottom: 1rem; color: #ff8888; font-size: 0.8rem; }
        .success { background: rgba(0,255,0,0.1); border-left: 3px solid #00ff00; padding: 0.8rem; border-radius: 8px; margin-bottom: 1rem; color: #88ff88; font-size: 0.8rem; }
        .back-home { text-align: center; margin-top: 1rem; }
        .back-home a { color: rgba(232,224,216,0.5); text-decoration: none; font-size: 0.8rem; }
    </style>
</head>
<body>
<div class="login-container">
    <div class="logo">JENNY'S GLAM</div>
    <h2>Welcome Back</h2>
    <div class="subtitle">Login to continue shopping</div>

    <?php if(isset($_GET['error'])): ?>
        <div class="error">
            <i class="fas fa-exclamation-circle"></i> 
            <?php 
                if($_GET['error'] == 'invalid') echo "Invalid email or password!";
                if($_GET['error'] == 'required') echo "Please fill all fields!";
            ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['registered']) && $_GET['registered'] == 'success'): ?>
        <div class="success">
            <i class="fas fa-check-circle"></i> Registration successful! Please login.
        </div>
    <?php endif; ?>

    <form method="POST" action="login_process.php">
        <div class="form-group">
            <label><i class="fas fa-envelope"></i> Email Address</label>
            <input type="email" name="email" required placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" required placeholder="Enter your password">
        </div>
        <button type="submit" class="btn-login"><i class="fas fa-arrow-right-to-bracket"></i> Login</button>
    </form>

    <div class="register-link">
        Don't have an account? <a href="register.php">Create Account</a>
    </div>
    <div class="back-home">
        <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
    </div>
</div>
</body>
</html>