<?php 
require_once 'config/database.php';
require_once 'config/auth.php';  // Login check ke liye

// Add to cart - Login required
if (isset($_GET['add'])) {
    requireLogin();  // Agar login nahi hai to login page pe bhejega
    $id = $_GET['add'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = ['name' => $name, 'price' => $price, 'quantity' => 1];
    }
    header("Location: cart.php");
    exit;
}

// Remove item
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: cart.php");
    exit;
}

// Update quantities
if (isset($_POST['update'])) {
    foreach ($_POST['qty'] as $id => $qty) {
        if ($qty <= 0) unset($_SESSION['cart'][$id]);
        else $_SESSION['cart'][$id]['quantity'] = (int)$qty;
    }
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | Jenny's Glam</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0a0a0a;
            color: #e8e0d8;
            min-height: 100vh;
        }

        h1, h2, h3, .cart-title {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.2rem 5%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(16px);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(212, 175, 122, 0.2);
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #ffffff, #d4af7a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #e8e0d8;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: 0.3s;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #d4af7a;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: #d4af7a;
        }

        .user-welcome {
            color: #d4af7a;
            font-size: 0.8rem;
            margin-left: 1rem;
        }

        .logout-btn {
            color: #ff6b6b !important;
        }
        .logout-btn:hover {
            color: #ff4444 !important;
        }

        .cart-icon {
            position: relative;
            color: #e8e0d8;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -12px;
            background: #d4af7a;
            color: #0a0a0a;
            font-size: 0.65rem;
            font-weight: 700;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Cart Container */
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 8rem 2rem 4rem;
        }

        /* Premium Cart Title */
        .cart-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .cart-title {
            font-size: 3rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #ffffff, #d4af7a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
            position: relative;
        }

        .cart-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4af7a, transparent);
        }

        .cart-subtitle {
            text-align: center;
            color: rgba(232, 224, 216, 0.5);
            font-size: 0.85rem;
            letter-spacing: 2px;
            margin-top: 1.5rem;
        }

        /* Cart Card */
        .cart-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border-radius: 28px;
            border: 1px solid rgba(212, 175, 122, 0.15);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-cart-icon {
            font-size: 5rem;
            color: rgba(212, 175, 122, 0.3);
            margin-bottom: 1.5rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .empty-cart h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .empty-cart p {
            color: rgba(232, 224, 216, 0.6);
            margin-bottom: 2rem;
        }

        .btn-continue {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            color: #0a0a0a;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        .btn-continue:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 122, 0.3);
            letter-spacing: 2px;
        }

        /* Cart Table */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th {
            text-align: left;
            padding: 1.5rem 1rem;
            color: #d4af7a;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(212, 175, 122, 0.2);
        }

        .cart-table td {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(232, 224, 216, 0.08);
            vertical-align: middle;
        }

        .product-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .product-price {
            color: #d4af7a;
            font-weight: 600;
        }

        .qty-input {
            width: 70px;
            padding: 0.6rem;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(212, 175, 122, 0.3);
            border-radius: 12px;
            color: #e8e0d8;
            text-align: center;
            font-weight: 500;
            transition: all 0.3s;
        }

        .qty-input:focus {
            outline: none;
            border-color: #d4af7a;
            box-shadow: 0 0 10px rgba(212, 175, 122, 0.2);
        }

        .remove-link {
            color: #ff6b6b;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .remove-link:hover {
            color: #ff4444;
            transform: scale(1.05);
        }

        .cart-footer {
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .total-label {
            font-size: 1.1rem;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .total-amount {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #d4af7a;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid rgba(212, 175, 122, 0.5);
            color: #d4af7a;
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-outline:hover {
            background: rgba(212, 175, 122, 0.1);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            color: #0a0a0a;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 122, 0.3);
            letter-spacing: 0.5px;
        }

        .continue-shopping {
            display: inline-block;
            margin-top: 2rem;
            text-align: center;
            width: 100%;
            color: rgba(232, 224, 216, 0.6);
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .continue-shopping:hover {
            color: #d4af7a;
            gap: 8px;
        }

        /* Login Required Message */
        .login-required {
            text-align: center;
            padding: 3rem;
        }
        .login-required i {
            font-size: 4rem;
            color: #d4af7a;
            margin-bottom: 1rem;
        }
        .login-required h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .login-required p {
            color: rgba(232,224,216,0.6);
            margin-bottom: 1.5rem;
        }
        .btn-login {
            display: inline-block;
            padding: 0.8rem 2rem;
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            color: #0a0a0a;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            margin: 0 0.5rem;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212,175,122,0.3);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem 5%;
            border-top: 1px solid rgba(212, 175, 122, 0.1);
            margin-top: 3rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .social-links a {
            color: #e8e0d8;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .social-links a:hover {
            color: #d4af7a;
            transform: translateY(-3px);
        }

        .footer p {
            opacity: 0.5;
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .cart-title {
                font-size: 2rem;
            }
            .cart-table th, .cart-table td {
                padding: 1rem 0.5rem;
            }
            .cart-footer {
                flex-direction: column;
                text-align: center;
            }
            .btn-group {
                flex-direction: column;
                width: 100%;
            }
            .btn-outline, .btn-primary {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">JENNY'S GLAM</a>
    <div class="nav-links">
        <a href="index.php">HOME</a>
        <a href="index.php#products">SHOP</a>
        <a href="index.php#products">COLLECTIONS</a>
        <a href="about.php">ABOUT</a>
        <a href="cart.php" style="color:#d4af7a;">CART</a>
        <?php if(isLoggedIn()): ?>
            <span class="user-welcome"><i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
        <?php else: ?>
            <a href="login.php"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
            <a href="register.php"><i class="fas fa-user-plus"></i> REGISTER</a>
        <?php endif; ?>
    </div>
    <a href="cart.php" class="cart-icon">
        <i class="fas fa-shopping-bag"></i>
        <span class="cart-count" id="cartCount">0</span>
    </a>
</nav>

<div class="cart-container">
    <div class="cart-header">
        <h1 class="cart-title">Your Shopping Cart</h1>
        <div class="cart-subtitle">REVIEW & CHECKOUT</div>
    </div>

    <div class="cart-card">
        <?php if(!isLoggedIn()): ?>
            <!-- Agar user login nahi hai to ye dikhega -->
            <div class="login-required">
                <i class="fas fa-lock"></i>
                <h3>Login Required</h3>
                <p>Please login to view and manage your shopping cart.</p>
                <a href="login.php" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login Now</a>
                <a href="register.php" class="btn-login" style="background:transparent; border:1px solid #d4af7a;"><i class="fas fa-user-plus"></i> Create Account</a>
            </div>
        <?php elseif (empty($_SESSION['cart'])): ?>
            <div class="empty-cart">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h2>Your cart is empty</h2>
                <p>Looks like you haven't added anything to your cart yet.</p>
                <a href="index.php#products" class="btn-continue">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
            </div>
        <?php else: ?>
            <form method="POST">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0; 
                        foreach($_SESSION['cart'] as $id => $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td class="product-name"><?php echo htmlspecialchars($item['name']); ?></td>
                            <td class="product-price">$<?php echo number_format($item['price'], 2); ?></td>
                            <td>
                                <input type="number" name="qty[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" min="0" class="qty-input">
                            </td>
                            <td class="product-price">$<?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <a href="?remove=<?php echo $id; ?>" class="remove-link" onclick="return confirm('Remove this item?')">
                                    <i class="fas fa-trash-alt"></i> Remove
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div class="cart-footer">
                    <div>
                        <span class="total-label">TOTAL AMOUNT</span>
                        <div class="total-amount">$<?php echo number_format($total, 2); ?></div>
                    </div>
                    <div class="btn-group">
                        <button type="submit" name="update" class="btn-outline">
                            <i class="fas fa-sync-alt"></i> Update Cart
                        </button>
                        <a href="checkout.php" class="btn-primary">
                            Proceed to Checkout <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </form>
            <div style="text-align: center; padding: 1.5rem;">
                <a href="index.php#products" class="continue-shopping">
                    <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="footer">
    <div class="social-links">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>JENNY'S GLAM — Luxury Cosmetics & Imitation Jewellery</p>
    <p>© 2024 Jenny's Glam. All rights reserved.</p>
</div>

<script>
    function updateCartCount() {
        fetch('cart_count.php')
            .then(res => res.json())
            .then(data => {
                const c = document.getElementById('cartCount');
                if (c) c.textContent = data.count;
            })
            .catch(() => {});
    }
    updateCartCount();
</script>
</body>
</html>