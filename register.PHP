<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Jenny's Glam</title>
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
        .register-container {
            max-width: 500px;
            width: 100%;
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(12px);
            border-radius: 28px;
            border: 1px solid rgba(212,175,122,0.2);
            padding: 2.5rem;
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
        input:focus { outline: none; border-color: #d4af7a; }
        .btn-register {
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
        .btn-register:hover { transform: translateY(-2px); }
        .login-link { text-align: center; margin-top: 1.5rem; color: rgba(232,224,216,0.6); font-size: 0.85rem; }
        .login-link a { color: #d4af7a; text-decoration: none; font-weight: 600; }
        .error { background: rgba(255,0,0,0.1); border-left: 3px solid #ff4444; padding: 0.8rem; border-radius: 8px; margin-bottom: 1rem; color: #ff8888; font-size: 0.8rem; }
        .back-home { text-align: center; margin-top: 1rem; }
        .back-home a { color: rgba(232,224,216,0.5); text-decoration: none; font-size: 0.8rem; }
    </style>
</head>
<body>
<div class="register-container">
    <div class="logo">JENNY'S GLAM</div>
    <h2>Create Account</h2>
    <div class="subtitle">Join us for exclusive offers</div>

    <?php if(isset($_GET['error'])): ?>
        <div class="error">
            <i class="fas fa-exclamation-circle"></i> 
            <?php 
                if($_GET['error'] == 'email') echo "Email already registered!";
                if($_GET['error'] == 'password') echo "Password must be at least 6 characters!";
                if($_GET['error'] == 'required') echo "Please fill all fields!";
                if($_GET['error'] == 'match') echo "Passwords do not match!";
            ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="register_process.php">
        <div class="form-group">
            <label><i class="fas fa-user"></i> Full Name</label>
            <input type="text" name="name" required placeholder="Enter your full name">
        </div>
        <div class="form-group">
            <label><i class="fas fa-envelope"></i> Email Address</label>
            <input type="email" name="email" required placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" required placeholder="Min. 6 characters">
        </div>
        <div class="form-group">
            <label><i class="fas fa-lock"></i> Confirm Password</label>
            <input type="password" name="confirm_password" required placeholder="Confirm your password">
        </div>
        <button type="submit" class="btn-register"><i class="fas fa-user-plus"></i> Register</button>
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Login Here</a>
    </div>
    <div class="back-home">
        <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
    </div>
</div>
</body>
</html>