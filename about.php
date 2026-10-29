<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Jenny's Glam</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0a0a0a; color: #e8e0d8; }
        h1, h2, h3 { font-family: 'Cormorant Garamond', serif; }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.2rem 5%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(12px);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(212, 175, 122, 0.2);
        }
        .logo { font-size: 1.6rem; font-weight: 600; letter-spacing: 2px; background: linear-gradient(135deg, #e8e0d8, #d4af7a); -webkit-background-clip: text; background-clip: text; color: transparent; text-decoration: none; }
        .nav-links { display: flex; gap: 2rem; align-items: center; }
        .nav-links a { color: #e8e0d8; text-decoration: none; font-size: 0.85rem; letter-spacing: 1px; transition: 0.3s; }
        .nav-links a:hover, .nav-links a.active { color: #d4af7a; }
        .cart-icon { position: relative; color: #e8e0d8; text-decoration: none; display: flex; align-items: center; gap: 8px; }
        .cart-count { position: absolute; top: -8px; right: -12px; background: #d4af7a; color: #0a0a0a; font-size: 0.65rem; font-weight: 700; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }

        .about-hero {
            position: relative;
            height: 50vh;
            min-height: 320px;
            margin-top: 70px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .about-hero-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            transform: scale(1);
            display: block;
        }

        .about-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(10,10,10,0.55) 0%,
                rgba(10,10,10,0.35) 40%,
                rgba(10,10,10,0.85) 100%
            );
        }

        .about-hero-content {
            position: relative;
            z-index: 2;
        }

        .about-hero h1 { font-size: 4rem; font-weight: 500; letter-spacing: 2px; color: #e8e0d8; }
        .about-hero h1 span { color: #d4af7a; font-style: italic; }
        .about-hero p { margin-top: 1rem; font-size: 0.9rem; letter-spacing: 2px; color: rgba(232,224,216,0.8); }

        .container { max-width: 1200px; margin: 0 auto; padding: 4rem 2rem; }
        .story { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 4rem; align-items: center; }
        .story-content h2 { font-size: 2rem; margin-bottom: 1rem; }
        .story-content h2::after { content: ''; display: block; width: 60px; height: 2px; background: #d4af7a; margin-top: 0.5rem; }
        .story-content p { line-height: 1.8; opacity: 0.8; margin-bottom: 1rem; }
        .story-image { background: linear-gradient(135deg, #d4af7a20, #0a0a0a); border-radius: 20px; height: 350px; display: flex; align-items: center; justify-content: center; font-size: 5rem; border: 1px solid rgba(212,175,122,0.2); }
        
        .mission { background: rgba(212,175,122,0.05); border-radius: 20px; padding: 3rem; text-align: center; margin-bottom: 4rem; border: 1px solid rgba(212,175,122,0.1); }
        .mission h2 { font-size: 2rem; margin-bottom: 1rem; }
        .mission p { max-width: 700px; margin: 0 auto; line-height: 1.8; opacity: 0.8; }
        
        .values { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 4rem; }
        .value-card { background: rgba(255,255,255,0.03); border-radius: 16px; padding: 2rem; text-align: center; transition: 0.3s; border: 1px solid rgba(212,175,122,0.1); }
        .value-card:hover { transform: translateY(-5px); border-color: rgba(212,175,122,0.3); }
        .value-card i { font-size: 2.5rem; color: #d4af7a; margin-bottom: 1rem; }
        .value-card h3 { font-size: 1.3rem; margin-bottom: 0.5rem; }
        .value-card p { font-size: 0.85rem; opacity: 0.7; }
        
        .team { text-align: center; margin-bottom: 4rem; }
        .team h2 { font-size: 2rem; margin-bottom: 2rem; }
        .team-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; }
        .team-member { background: rgba(255,255,255,0.03); border-radius: 16px; padding: 1.5rem; transition: 0.3s; }
        .team-member:hover { transform: translateY(-5px); background: rgba(212,175,122,0.05); }
        .team-member i { font-size: 3rem; color: #d4af7a; margin-bottom: 1rem; }
        .team-member h3 { font-size: 1.2rem; margin-bottom: 0.3rem; }
        .team-member p { font-size: 0.8rem; opacity: 0.6; }
        
        .footer { text-align: center; padding: 3rem 5%; border-top: 1px solid rgba(212,175,122,0.2); margin-top: 2rem; }
        .social-links { display: flex; justify-content: center; gap: 1.5rem; margin-bottom: 1.5rem; }
        .social-links a { color: #e8e0d8; font-size: 1.5rem; transition: 0.3s; }
        .social-links a:hover { color: #d4af7a; transform: translateY(-3px); }
        
        @media (max-width: 768px) { .nav-links { display: none; } .story { grid-template-columns: 1fr; } .about-hero h1 { font-size: 2.5rem; } }

        .about-media-gallery {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 170px 170px;
            gap: 15px;
        }

        .gallery-span-2 {
            grid-row: span 2;
        }

        .art-image-card {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(212,175,122,0.2);
            transition: 0.3s;
        }

        .art-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .art-image-card:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="logo">JENNY'S GLAM</a>
    <div class="nav-links">
        <a href="index.php">HOME</a>
        <a href="index.php#productsSection">SHOP</a>
        <a href="index.php#productsSection">COLLECTIONS</a>
        <a href="about.php" class="active">ABOUT US</a>
        <a href="cart.php">CART</a>
    </div>
    <a href="cart.php" class="cart-icon">
        <i class="fas fa-shopping-bag"></i>
        <span class="cart-count" id="cartCount">0</span>
    </a>
</nav>

<section class="about-hero">
    <img
        class="about-hero-img"
        src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?w=1800&auto=format&fit=crop&q=80"
        alt="Luxury cosmetics flat lay"
    />
    <div class="about-hero-overlay"></div>
    <div class="about-hero-content">
        <h1>Our <span>Story</span></h1>
        <p>Luxury Cosmetics &amp; Imitation Jewellery Since 2020</p>
    </div>
</section>

<div class="container">
    <div class="story">
        <div class="story-content">
            <h2>Jenny's Journey</h2>
            <p>Jenny started her business from home with a simple dream — to bring affordable luxury to every woman. What began as a small venture of cosmetics and imitation jewellery has now grown into a trusted brand loved by thousands.</p>
            <p>With a passion for beauty and elegance, Jenny personally curates every product in our collection, ensuring only the highest quality reaches our customers.</p>
            <p>Today, Jenny's Glam is proud to serve clients across the country, offering premium cosmetics and stunning jewellery that make every woman feel special.</p>
        </div>
        <div class="about-media-gallery">
            <div class="art-image-card gallery-span-2">
                <img src="https://i.pinimg.com/736x/1a/95/a2/1a95a29ea0230ee82862b834d9b2e8ba.jpg" alt="Luxury makeup arrangement" loading="lazy">
            </div>
            <div class="art-image-card">
                <img src="https://i.pinimg.com/1200x/15/8a/ad/158aadfc6dd3ac0c6e9861967ee28fee.jpg" alt="Elegant gold jewellery" loading="lazy">
            </div>
            <div class="art-image-card">
                <img src="https://images.unsplash.com/photo-1612817288484-6f916006741a?w=500&auto=format" alt="High-end cosmetics display" loading="lazy">
            </div>
        </div>
    </div>
    
    <div class="mission">
        <h2>Our Mission</h2>
        <p>To empower women with high-quality, affordable luxury cosmetics and imitation jewellery that enhance their natural beauty and confidence. We believe every woman deserves to feel glamorous, every single day.</p>
    </div>
    
    <div class="values">
        <div class="value-card">
            <i class="fas fa-gem"></i>
            <h3>Quality First</h3>
            <p>We never compromise on quality. Every product is carefully tested and selected.</p>
        </div>
        <div class="value-card">
            <i class="fas fa-heart"></i>
            <h3>Customer Love</h3>
            <p>Our customers are family. We're committed to exceptional service and support.</p>
        </div>
        <div class="value-card">
            <i class="fas fa-leaf"></i>
            <h3>Ethical Beauty</h3>
            <p>All our cosmetics are cruelty-free and made with safe, premium ingredients.</p>
        </div>
        <div class="value-card">
            <i class="fas fa-hand-holding-heart"></i>
            <h3>Affordable Luxury</h3>
            <p>Luxury shouldn't break the bank. We offer premium products at fair prices.</p>
        </div>
    </div>
    
    <div class="team">
        <h2>Meet Our Founder</h2>
        <div class="team-grid">
            <div class="team-member">
                <i class="fas fa-user-circle"></i>
                <h3>Jenny Maria</h3>
                <p>Founder & CEO</p>
                <p style="font-size: 0.75rem; margin-top: 0.5rem;">"Bringing beauty to every woman's life"</p>
            </div>
        </div>
    </div>
    
</div>

<div class="footer">
    <div class="social-links">
        <a href="https://www.instagram.com/jennysglam" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/jennysglam" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.twitter.com/jennysglam" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/jennysglam" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>JENNY'S GLAM — Luxury Cosmetics & Imitation Jewellery</p>
    <p style="margin-top: 0.5rem;">© 2024 Jenny's Glam. All rights reserved.</p>
</div>

<script>
    function updateCartCount() {
        fetch('cart_count.php').then(res => res.json()).then(data => {
            const c = document.getElementById('cartCount');
            if(c) c.textContent = data.count;
        }).catch(() => {});
    }
    updateCartCount();
</script>
</body>
</html>
