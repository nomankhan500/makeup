<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenny's Glam | Luxury Cosmetics & Jewellery</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ========== ALL EXISTING STYLES (SAME AS BEFORE, KEPT INTACT) ========== */
        /* ... (keep all your existing CSS exactly as you had, no changes needed) ... */
        /* For brevity, I'm including the full CSS from your last message. */
        /* Hero Section - Premium Gradient Animation */
      .hero {
    position: relative;
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start; /* LEFT ALIGN */
    text-align: left;
    padding: 0 8%;
    overflow: hidden;
    
        /* IMAGE */
    background: url('image/hero.jpg') no-repeat center center/cover;
}



/* Dark overlay for readability */
.hero::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.55);
}

/* Content on top */
.hero-content {
    position: relative;
    z-index: 2;
    max-width: 550px;
}

/* Bigger text like design */
.hero-title {
    font-size: 4rem;
    line-height: 1.2;
}

.hero-desc {
    margin: 20px 0;
    font-size: 1rem;
}


        .btn-shop {
            display: inline-block;
            padding: 12px 30px;
            background: transparent;
            border: 2px solid #d4af7a;
            color: #d4af7a;
            text-decoration: none;
            letter-spacing: 2px;
            transition: 0.3s;
            animation: fadeInUp 0.8s ease 0.6s backwards;
        }
        .btn-shop:hover {
            background: #d4af7a;
            color: #0a0a0a;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(212,175,122,0.3);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .hero-gold-1, .hero-gold-2, .hero-gold-3 {
            position: absolute;
            font-size: 2rem;
            color: rgba(212,175,122,0.2);
            z-index: 1;
            animation: floatGold 8s ease infinite;
        }
        .hero-gold-1 { top: 20%; left: 10%; animation-delay: 0s; }
        .hero-gold-2 { bottom: 25%; right: 15%; font-size: 3rem; animation-delay: 2s; }
        .hero-gold-3 { top: 60%; left: 85%; font-size: 1.5rem; animation-delay: 4s; }
        @keyframes floatGold {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.2; }
            50% { transform: translateY(-20px) rotate(10deg); opacity: 0.5; }
        }
        .cursor-glow {
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, rgba(212, 175, 122, 0.4), rgba(212, 175, 122, 0.1), transparent);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: width 0.2s ease, height 0.2s ease;
        }
        .product-card {
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .product-card:hover {
            transform: translateY(-20px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 30px 50px -20px rgba(212, 175, 122, 0.4);
        }
        .navbar, .product-card, .cart-card {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 122, 0.2);
            position: relative;
            overflow: hidden;
        }
        .navbar::before, .product-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(212,175,122,0.1), transparent 70%);
            animation: liquidMove 8s linear infinite;
            pointer-events: none;
        }
        @keyframes liquidMove {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .cursor-trail {
            position: fixed;
            width: 8px;
            height: 8px;
            background: radial-gradient(circle, #d4af7a, transparent);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            opacity: 0.8;
            transition: transform 0.1s ease;
        }
        .product-card {
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .product-card:hover {
            box-shadow: 0 0 30px rgba(212, 175, 122, 0.5);
            transform: translateY(-15px) scale(1.02);
        }
        .product-card {
            opacity: 0;
            animation: cardReveal 0.6s ease forwards;
        }
        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }
        @keyframes cardReveal {
            from { opacity: 0; transform: translateY(50px) scale(0.9); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .morphing-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }
        .morphing-bg div {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212,175,122,0.08), transparent);
            animation: morph 12s ease-in-out infinite;
        }
        @keyframes morph {
            0%, 100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; transform: translate(0, 0) rotate(0deg); }
            50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; transform: translate(100px, 50px) rotate(180deg); }
        }
        .typing-text {
            overflow: hidden;
            border-right: 3px solid var(--gold);
            white-space: nowrap;
            animation: typing 3s steps(40, end), blinkCursor 0.75s step-end infinite;
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blinkCursor {
            from, to { border-color: transparent; }
            50% { border-color: var(--gold); }
        }
        .btn-add, .btn-shop {
            position: relative;
            overflow: hidden;
        }
        .btn-add::after, .btn-shop::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .btn-add:active::after, .btn-shop:active::after {
            width: 300px;
            height: 300px;
        }
        .product-price {
            animation: priceGlow 2s ease-in-out infinite;
        }
        @keyframes priceGlow {
            0%, 100% { text-shadow: 0 0 0px rgba(212,175,122,0); }
            50% { text-shadow: 0 0 10px rgba(212,175,122,0.5); }
        }
        .stat-number {
            display: inline-block;
            animation: countPop 0.3s ease-out;
        }
        @keyframes countPop {
            0% { transform: scale(0.5); opacity: 0; }
            80% { transform: scale(1.2); }
            100% { transform: scale(1); opacity: 1; }
        }
        .cursor-glow.glow-active {
            width: 70px;
            height: 70px;
            background: radial-gradient(circle, rgba(212, 175, 122, 0.6), rgba(212, 175, 122, 0.2), transparent);
        }
        .hero {
            transition: transform 0.15s ease-out;
            transform-origin: center center;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            --bg-primary: #0a0a0a;
            --bg-secondary: #1a1a2e;
            --text-primary: #e8e0d8;
            --text-secondary: rgba(232, 224, 216, 0.7);
            --card-bg: rgba(255, 255, 255, 0.03);
            --border-color: rgba(212, 175, 122, 0.2);
            --gold: #d4af7a;
        }
        body.light-mode {
            --bg-primary: #f5f0eb;
            --bg-secondary: #ffffff;
            --text-primary: #000000;
            --text-secondary: rgba(6, 6, 12, 0.7);
            --card-bg: rgba(0, 0, 0, 0.02);
            --border-color: rgba(212, 175, 122, 0.3);
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            scroll-behavior: smooth;
            transition: background 0.3s ease, color 0.3s ease;
        }
        h1, h2, h3, .logo, .hero-title, .section-title, .footer-logo {
            font-family: 'Playfair Display', serif;
        }
        .theme-toggle {
            background: rgba(212, 175, 122, 0.15);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            padding: 6px 14px;
            cursor: pointer;
            color: var(--gold);
            transition: all 0.3s;
            font-size: 0.8rem;
            font-weight: 500;
        }
        .theme-toggle:hover {
            background: var(--gold);
            color: #0a0a0a;
            transform: translateY(-2px);
        }
        .admin-link-nav {
            background: linear-gradient(135deg, var(--gold), #724805);
            padding: 6px 16px;
            border-radius: 30px;
            color: #0a0a0a !important;
            font-weight: 700;
        }
        .admin-link-nav::after { display: none; }
        .admin-link-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212,175,122,0.3);
            color: #0a0a0a !important;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.2rem 5%;
            background: var(--bg-primary);
            backdrop-filter: blur(16px);
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            transition: all 0.4s ease;
        }
        .navbar.scrolled { padding: 0.8rem 5%; background: var(--bg-primary); }
        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #ffffff, var(--gold));
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
            color: var(--text-primary);
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
            background: var(--gold);
            transition: width 0.3s ease;
        }
        .nav-links a:hover::after, .nav-links a.active::after { width: 100%; }
        .nav-links a:hover { color: var(--gold); }
        .cart-icon {
            position: relative;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -12px;
            background: var(--gold);
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

        
      .hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: flex-start; /* LEFT */
    text-align: left;
    padding: 0 8%;
    position: relative;
    overflow: hidden;

    /* IMAGE */
    background: url('image/hero.jpg') no-repeat center center/cover;
}


        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 0.8s ease;
        }
        .hero-subtitle {
            font-size: 0.8rem;
            letter-spacing: 6px;
            color: var(--gold);
            margin-bottom: 1rem;
        }
        .hero-title {
            font-size: 5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .hero-title span { font-style: italic; color: var(--gold); }
        .hero-desc {
            font-size: 1rem;
            max-width: 500px;
            margin: 1.5rem auto;
            opacity: 0.8;
        }
        .btn-shop {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: transparent;
            border: 1.5px solid var(--gold);
            color: var(--gold);
            text-decoration: none;
            letter-spacing: 2px;
            transition: 0.4s;
        }
        .btn-shop:hover {
            background: var(--gold);
            color: #0a0a0a;
            transform: translateY(-3px);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .products-section {
            padding: 6rem 5% 4rem;
            text-align: center;
        }
        .section-title {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .section-subtitle {
            color: var(--gold);
            font-size: 0.8rem;
            letter-spacing: 3px;
            margin-bottom: 3rem;
        }
        .search-box {
            max-width: 400px;
            margin: 0 auto 2rem;
            display: flex;
            border-bottom: 1px solid var(--border-color);
            padding: 0.5rem;
        }
        .search-box input {
            flex: 1;
            background: transparent;
            border: none;
            padding: 0.8rem;
            color: var(--text-primary);
            outline: none;
        }
        .search-box button {
            background: transparent;
            border: none;
            color: var(--gold);
            cursor: pointer;
        }
        .category-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }
        .filter-btn {
            background: transparent;
            border: 1px solid var(--border-color);
            padding: 0.6rem 1.8rem;
            border-radius: 30px;
            color: var(--text-primary);
            cursor: pointer;
            transition: 0.3s;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--gold);
            border-color: var(--gold);
            color: #0a0a0a;
            transform: translateY(-2px);
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        .product-card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid var(--border-color);
            position: relative;
        }
        .product-card:hover {
            transform: translateY(-12px);
            border-color: var(--gold);
            box-shadow: 0 30px 50px -20px rgba(212, 175, 122, 0.25);
        }
        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, var(--gold), #b8945a);
            color: #0a0a0a;
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
            z-index: 2;
        }
        .product-image {
            height: 260px;
            background: linear-gradient(135deg, var(--bg-secondary), #2a2a3e);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .product-card:hover .product-image img { transform: scale(1.1); }
        .product-image i {
            font-size: 3.5rem;
            color: var(--gold);
            transition: transform 0.6s ease;
        }
        .product-card:hover .product-image i { transform: scale(1.1); }
        .product-info { padding: 1.5rem; }
        .product-category {
            font-size: 0.7rem;
            color: var(--gold);
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }
        .product-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--gold);
            margin: 0.5rem 0;
        }
        .reviews-section {
            margin-top: 1rem;
            padding-top: 0.8rem;
            border-top: 1px solid var(--border-color);
        }
        .rating-stars { color: var(--gold); font-size: 0.85rem; margin-bottom: 0.3rem; }
        .review-count { font-size: 0.7rem; opacity: 0.6; margin-left: 0.3rem; }
        .view-reviews-btn {
            background: transparent;
            border: 1px solid var(--border-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.7rem;
            cursor: pointer;
            transition: 0.3s;
            color: var(--text-primary);
            margin-top: 0.5rem;
            width: 100%;
        }
        .view-reviews-btn:hover {
            background: var(--gold);
            color: #0a0a0a;
        }
        .btn-add {
            width: 100%;
            padding: 0.8rem;
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-weight: 600;
            margin-top: 0.8rem;
        }
        .btn-add:hover {
            background: var(--gold);
            color: #0a0a0a;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: var(--bg-primary);
            border-radius: 24px;
            max-width: 500px;
            width: 90%;
            padding: 2rem;
            border: 1px solid var(--gold);
            max-height: 80vh;
            overflow-y: auto;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .modal-header h3 { color: var(--gold); }
        .close-modal {
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-primary);
        }
        .review-item {
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
        }
        .review-user { font-weight: 600; margin-bottom: 0.3rem; }
        .review-rating { color: var(--gold); font-size: 0.8rem; margin-bottom: 0.3rem; }
        .review-comment { font-size: 0.85rem; opacity: 0.8; }
        .review-date { font-size: 0.7rem; opacity: 0.5; margin-top: 0.3rem; }
        .write-review {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }
        .write-review h4 { margin-bottom: 1rem; color: var(--gold); }
        .write-review input, .write-review textarea, .write-review select {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-primary);
        }
        .submit-review-btn {
            background: var(--gold);
            color: #0a0a0a;
            border: none;
            padding: 0.8rem;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
        }
        .premium-about-section {
            padding: 7rem 5% 5rem;
            background: var(--bg-primary);
            position: relative;
            overflow: hidden;
        }
        .premium-about-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 4rem;
            align-items: center;
        }
        .about-legacy { flex: 1.2; min-width: 280px; }
        .section-label {
            font-size: 0.8rem;
            letter-spacing: 5px;
            color: var(--gold);
            margin-bottom: 1rem;
            text-transform: uppercase;
        }
        .about-legacy h2 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(120deg, var(--gold), #f3e3c2);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .about-description {
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 2rem;
            opacity: 0.85;
        }
        .exp-awards-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.8rem;
            margin: 2rem 0 1rem;
        }
        .exp-card, .award-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 28px;
            padding: 1.3rem 1.6rem;
            flex: 1;
            min-width: 170px;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .exp-card:hover, .award-card:hover {
            transform: translateY(-8px);
            border-color: var(--gold);
            box-shadow: 0 20px 35px var(--gold-glow);
        }
        .exp-card i, .award-card i {
            font-size: 2.2rem;
            color: var(--gold);
            margin-bottom: 0.8rem;
            display: inline-block;
        }
        .exp-card h4, .award-card h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .exp-card p, .award-card p { font-size: 0.85rem; opacity: 0.8; }
        .award-badge {
            margin-top: 0.8rem;
            display: flex;
            gap: 0.5rem;
            align-items: center;
            font-size: 0.8rem;
            color: var(--gold);
        }
        .about-media-gallery {
            flex: 0.9;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            perspective: 800px;
        }
        .art-image-card {
            background: linear-gradient(145deg, rgba(212,175,122,0.12), rgba(0,0,0,0.2));
            border-radius: 32px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.5s ease;
            transform-style: preserve-3d;
            position: relative;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }
        .art-image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), filter 0.4s;
        }
        .art-image-card:hover {
            transform: translateY(-12px) rotateY(4deg) rotateX(2deg);
            border-color: var(--gold);
            box-shadow: 0 30px 45px -15px rgba(212,175,122,0.4);
        }
        .art-image-card:hover img {
            transform: scale(1.06);
            filter: brightness(1.05) contrast(1.02);
        }
        .art-image-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212,175,122,0.2), transparent);
            transition: left 0.7s ease;
            pointer-events: none;
        }
        .art-image-card:hover::after { left: 100%; }
        .gallery-span-2 {
            grid-row: span 2;
            height: 100%;
            min-height: 320px;
        }
        @media (max-width: 880px) {
            .premium-about-container { flex-direction: column; }
            .about-media-gallery { width: 100%; max-width: 550px; margin: 0 auto; }
        }
        @media (max-width: 550px) {
            .about-media-gallery { grid-template-columns: 1fr; }
            .gallery-span-2 { grid-row: auto; height: auto; }
        }
        .premium-footer {
            background: var(--bg-primary);
            border-top: 1px solid var(--border-color);
            margin-top: 4rem;
        }
        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 5% 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
        }
        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ffffff, var(--gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
            letter-spacing: 1px;
        }
        .footer-desc {
            font-size: 0.85rem;
            line-height: 1.6;
            opacity: 0.7;
            margin-bottom: 1.5rem;
        }
        .footer-social {
            display: flex;
            gap: 1rem;
        }
        .footer-social a {
            width: 36px;
            height: 36px;
            background: rgba(212, 175, 122, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            transition: all 0.3s;
            text-decoration: none;
        }
        .footer-social a:hover {
            background: var(--gold);
            color: #0a0a0a;
            transform: translateY(-3px);
        }
        .footer-col h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            color: var(--gold);
            position: relative;
            display: inline-block;
        }
        .footer-col h4::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--gold);
        }
        .footer-links {
            list-style: none;
        }
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        .footer-links a {
            color: var(--text-primary);
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s;
            opacity: 0.7;
        }
        .footer-links a:hover {
            opacity: 1;
            color: var(--gold);
            padding-left: 5px;
        }
        .footer-admin-link {
            margin-top: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid var(--border-color);
        }
        .footer-admin-link a {
            background: linear-gradient(135deg, var(--gold), #b8945a);
            display: inline-block;
            padding: 6px 16px;
            border-radius: 30px;
            color: #0a0a0a !important;
            font-weight: 700;
            opacity: 1;
        }
        .footer-admin-link a:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212,175,122,0.3);
            padding-left: 16px;
        }
        .newsletter-text {
            font-size: 0.8rem;
            opacity: 0.7;
            margin-bottom: 1rem;
        }
        .newsletter-form {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .newsletter-form input {
            flex: 1;
            padding: 0.8rem 1rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            color: var(--text-primary);
            font-size: 0.85rem;
            outline: none;
            transition: all 0.3s;
        }
        .newsletter-form input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 10px rgba(212, 175, 122, 0.2);
        }
        .newsletter-form button {
            background: linear-gradient(135deg, var(--gold), #b8945a);
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            color: #0a0a0a;
            cursor: pointer;
            transition: all 0.3s;
        }
        .newsletter-form button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(212, 175, 122, 0.3);
        }
        .payment-methods {
            display: flex;
            gap: 1rem;
            font-size: 1.5rem;
            opacity: 0.6;
            align-items: center;
            flex-wrap: wrap;
        }
        .payment-methods a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-decoration: none;
            color: inherit;
        }
        .payment-methods a:hover {
            transform: translateY(-2px);
            opacity: 1;
        }
        .footer-bottom {
            border-top: 1px solid var(--border-color);
            padding: 1.5rem 5%;
        }
        .footer-bottom-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .footer-bottom p { font-size: 0.75rem; opacity: 0.5; }
        .back-to-top {
            background: rgba(212, 175, 122, 0.15);
            border: 1px solid var(--border-color);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            color: var(--gold);
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        .back-to-top:hover {
            background: var(--gold);
            color: #0a0a0a;
            transform: translateY(-3px);
        }
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero-title { font-size: 2.5rem; }
            .products-grid { grid-template-columns: 1fr; }
            .footer-container { grid-template-columns: 1fr; text-align: center; }
            .footer-col h4::after { left: 50%; transform: translateX(-50%); }
            .footer-social { justify-content: center; }
            .footer-bottom-content { flex-direction: column; text-align: center; }
            .payment-methods { justify-content: center; }
        }
        body { animation: fadeInPage 0.6s ease-out; }
        @keyframes fadeInPage {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-add:after, .btn-shop:after, .filter-btn:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.4s, height 0.4s;
        }
        .btn-add:active:after, .btn-shop:active:after {
            width: 200px;
            height: 200px;
        }
        .product-image img { transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1); }
        .product-card:hover .product-image img { transform: scale(1.1); }
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(212,175,122,0.2);
            z-index: 10000;
        }
        .progress-bar {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, #d4af7a, #e9c46a);
            transition: width 0.1s ease;
        }

      
     .hero-desc{
        color: #ffffff;
     }

     .hero-title{
        color: #ffffff;
     }
    
    </style>
</head>
<body>

<!-- ==================== NAVBAR ==================== -->
<nav class="navbar" id="navbar">
    <a href="#home" class="logo" data-nav="home">JENNY'S GLAM</a>
    <div class="nav-links">
        <a href="#home" class="nav-link active" data-nav="home">HOME</a>
        <a href="#products" class="nav-link" data-nav="products">SHOP</a>
        <a href="#products" class="nav-link" data-nav="products" id="collectionsLink">COLLECTIONS</a>
        <a href="#about" class="nav-link" data-nav="about">ABOUT</a>
        <a href="cart.php" class="nav-link">CART</a>
        <a href="admin/index.php" class="admin-link-nav"><i class="fas fa-user-shield"></i> ADMIN</a>
        <button class="theme-toggle" id="themeToggle"><i class="fas fa-moon"></i> <span id="themeText">Dark</span></button>
    </div>
    <a href="cart.php" class="cart-icon">
        <i class="fas fa-shopping-bag"></i>
        <span class="cart-count" id="cartCount">0</span>
    </a>
</nav>

<!-- ==================== HERO SECTION ==================== -->
<section id="heroSection" class="hero">
    <div class="hero-content">
        <div class="hero-subtitle">LUXURY REDEFINED</div>

        <h1 class="hero-title">
            Where Beauty <span>Meets</span><br>Elegance
        </h1>

        <p class="hero-desc">
            Discover premium cosmetics & imitation jewellery crafted for the modern woman
        </p>

        <a href="#products" class="btn-shop">EXPLORE COLLECTION →</a>
    </div>
</section>

<!-- ==================== PRODUCTS SECTION ==================== -->
<section id="productsSection" class="products-section">
    <h2 class="section-title">Our Collections</h2>
    <div class="section-subtitle">LUXURY COSMETICS & JEWELLERY</div>
    <div class="search-box">
        <form method="GET" action="" style="display: flex; width: 100%;">
            <input type="text" name="search" placeholder="Search products..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="category-filters">
        <button class="filter-btn active" data-cat="all">ALL</button>
        <?php $cats = $pdo->query("SELECT * FROM categories"); while($cat = $cats->fetch()): ?>
        <button class="filter-btn" data-cat="<?php echo $cat['id']; ?>"><?php echo strtoupper($cat['name']); ?></button>
        <?php endwhile; ?>
    </div>
    <div class="products-grid" id="productsGrid">
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        if ($search) {
            $stmt = $pdo->prepare("SELECT p.*, c.name as cat_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.name LIKE :search");
            $stmt->execute(['search' => "%$search%"]);
        } else {
            $stmt = $pdo->query("SELECT p.*, c.name as cat_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.is_trending DESC, p.id DESC");
        }
        while ($product = $stmt->fetch()):
        ?>
        <div class="product-card" data-category="<?php echo $product['category_id']; ?>" data-product-id="<?php echo $product['id']; ?>">
            <?php if ($product['badge']): ?>
                <div class="product-badge"><?php echo $product['badge']; ?></div>
            <?php endif; ?>
            <div class="product-image">
                <?php if(!empty($product['image_url']) && file_exists($product['image_url'])): ?>
                    <img src="<?php echo $product['image_url']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <?php else: ?>
                    <i class="fas <?php echo $product['category_id'] == 1 ? 'fa-lipstick' : ($product['category_id'] == 2 ? 'fa-gem' : ($product['category_id'] == 3 ? 'fa-spa' : 'fa-leaf')); ?>"></i>
                <?php endif; ?>
            </div>
            <div class="product-info">
                <div class="product-category"><?php echo $product['cat_name']; ?></div>
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <p><?php echo htmlspecialchars(substr($product['description'], 0, 60)); ?>...</p>
                <div class="product-price">$<?php echo number_format($product['price'], 2); ?></div>
                <div class="reviews-section" id="reviews-<?php echo $product['id']; ?>">
                    <div class="rating-stars" id="stars-<?php echo $product['id']; ?>">★★★★★</div>
                    <span class="review-count" id="reviewCount-<?php echo $product['id']; ?>">Loading...</span>
                    <button class="view-reviews-btn" onclick="showReviewModal(<?php echo $product['id']; ?>, '<?php echo htmlspecialchars($product['name']); ?>')">
                        <i class="fas fa-comment"></i> Read Reviews
                    </button>
                </div>
                <a href="cart.php?add=<?php echo $product['id']; ?>&name=<?php echo urlencode($product['name']); ?>&price=<?php echo $product['price']; ?>" class="btn-add"><i class="fas fa-shopping-bag"></i> ADD TO CART</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- ==================== ABOUT SECTION ==================== -->
<section id="aboutSection" class="premium-about-section">
    <div class="premium-about-container">
        <div class="about-legacy">
            <div class="section-label">✦ OUR LEGACY ✦</div>
            <h2>Beyond Beauty, <br> A Statement of Excellence</h2>
            <p class="about-description">
                Founded by Jenny Martinez in 2015, Jenny's Glam started as a passion project to redefine affordable luxury. 
                What began as a small boutique has now evolved into an internationally admired brand, trusted by beauty enthusiasts 
                and fashion icons. Our commitment to craftsmanship, innovation, and ethical beauty has positioned us at the forefront 
                of the cosmetics & imitation jewellery industry.
            </p>
            <div class="exp-awards-grid">
                <div class="exp-card">
                    <i class="fas fa-award"></i>
                    <h4>10+ Years</h4>
                    <p>Industry expertise & global recognition</p>
                </div>
                <div class="exp-card">
                    <i class="fas fa-trophy"></i>
                    <h4>25+ Awards</h4>
                    <p>Luxury Beauty Awards, Best Jewelry Design 2022-2024</p>
                    <div class="award-badge"><i class="fas fa-medal"></i> "Best Emerging Brand"</div>
                </div>
            </div>
            <div class="exp-awards-grid" style="margin-top: 0;">
                <div class="award-card">
                    <i class="fas fa-globe-asia"></i>
                    <h4>Global Presence</h4>
                    <p>Shipped to 45+ countries | Flagship in NYC & Dubai</p>
                </div>
                <div class="award-card">
                    <i class="fas fa-certificate"></i>
                    <h4>Certified Excellence</h4>
                    <p>ISO 22716 | Cruelty-Free | Sustainable sourcing</p>
                </div>
            </div>
            <div class="exp-card" style="margin-top: 1rem; background: linear-gradient(125deg, rgba(212,175,122,0.1), transparent);">
                <i class="fas fa-chart-line"></i>
                <h4>Recognized by Vogue & Harper's Bazaar</h4>
                <p>"Jenny's Glam: Where elegance meets everyday luxury" — Editor's Choice 2024</p>
            </div>
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
</section>

<!-- ==================== FOOTER ==================== -->
<footer class="premium-footer">
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-logo">JENNY'S GLAM</div>
            <p class="footer-desc">Luxury cosmetics & imitation jewellery crafted for the modern woman who deserves nothing but the best.</p>
            <div class="footer-social">
                <a href="#" class="social-icon" data-platform="instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon" data-platform="facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon" data-platform="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon" data-platform="linkedin"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-icon" data-platform="pinterest"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul class="footer-links">
                <li><a href="#home" data-nav="home">Home</a></li>
                <li><a href="#products" data-nav="products">Shop</a></li>
                <li><a href="#products" data-nav="products" id="footerCollectionsLink">Collections</a></li>
                <li><a href="#about" data-nav="about">About Us</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li class="footer-admin-link"><a href="admin/index.php"><i class="fas fa-user-shield"></i> Admin Panel</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Categories</h4>
            <ul class="footer-links">
                <li><a href="#" class="cat-filter" data-cat="1">Cosmetics</a></li>
                <li><a href="#" class="cat-filter" data-cat="2">Jewellery</a></li>
                <li><a href="#" class="cat-filter" data-cat="3">Skincare</a></li>
                <li><a href="#" class="cat-filter" data-cat="4">Fragrance</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Stay Updated</h4>
            <p class="newsletter-text">Subscribe for exclusive offers & new arrivals</p>
            <form class="newsletter-form" id="newsletterForm">
                <input type="email" placeholder="Your email address" required>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
            <div class="payment-methods">
                <a href="#" class="payment-icon" data-payment="visa"><i class="fab fa-cc-visa"></i></a>
                <a href="#" class="payment-icon" data-payment="mastercard"><i class="fab fa-cc-mastercard"></i></a>
                <a href="#" class="payment-icon" data-payment="paypal"><i class="fab fa-cc-paypal"></i></a>
                <a href="#" class="payment-icon" data-payment="easypaisa"><span style="background: #8B5CF6; color: white; padding: 4px 10px; border-radius: 8px; font-size: 11px; font-weight: bold;">EasyPaisa</span></a>
                <a href="#" class="payment-icon" data-payment="jazzcash"><span style="background: #FF6B35; color: white; padding: 4px 10px; border-radius: 8px; font-size: 11px; font-weight: bold;">JazzCash</span></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; 2024 Jenny's Glam. All rights reserved. | Luxury Cosmetics & Imitation Jewellery</p>
            <button class="back-to-top" id="backToTop">
                <i class="fas fa-arrow-up"></i> Back to Top
            </button>
        </div>
    </div>
</footer>

<!-- Review Modal -->
<div id="reviewModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalProductName">Reviews</h3>
            <span class="close-modal" onclick="closeReviewModal()">&times;</span>
        </div>
        <div id="reviewsList"></div>
        <div class="write-review">
            <h4>Write a Review</h4>
            <input type="text" id="reviewerName" placeholder="Your Name" required>
            <select id="reviewRating">
                <option value="5">★★★★★ (5/5)</option>
                <option value="4">★★★★☆ (4/5)</option>
                <option value="3">★★★☆☆ (3/5)</option>
                <option value="2">★★☆☆☆ (2/5)</option>
                <option value="1">★☆☆☆☆ (1/5)</option>
            </select>
            <textarea id="reviewComment" rows="3" placeholder="Share your experience..." required></textarea>
            <button class="submit-review-btn" onclick="submitReview()">Submit Review</button>
        </div>
    </div>
</div>

<!-- jQuery and Custom Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // ========== SECTION TOGGLING LOGIC (3-in-1 PAGE) ==========
    // Get references to the three main sections
    const heroSection = document.getElementById('heroSection');
    const productsSection = document.getElementById('productsSection');
    const aboutSection = document.getElementById('aboutSection');

    // Function to show/hide sections based on the active view
    function setActiveView(view) {
        // Hide all sections first
        heroSection.style.display = 'none';
        productsSection.style.display = 'none';
        aboutSection.style.display = 'none';
        
        // Then show the requested view
        if (view === 'home') {
            heroSection.style.display = 'flex';   // hero uses flex
            productsSection.style.display = 'block';
            aboutSection.style.display = 'block';
        } else if (view === 'products') {
            productsSection.style.display = 'block';
        } else if (view === 'about') {
            aboutSection.style.display = 'block';
        }
        
        // Update active class on nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if ((view === 'home' && link.getAttribute('data-nav') === 'home') ||
                (view === 'products' && link.getAttribute('data-nav') === 'products') ||
                (view === 'about' && link.getAttribute('data-nav') === 'about')) {
                link.classList.add('active');
            }
        });
        
        // Update URL hash without scrolling
        history.pushState(null, null, `#${view}`);
    }
    
    // Handle clicks on any element that has data-nav attribute (navbar links, footer quick links, etc.)
    document.querySelectorAll('[data-nav]').forEach(el => {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            const view = this.getAttribute('data-nav');
            if (view === 'home' || view === 'products' || view === 'about') {
                setActiveView(view);
                // Scroll to top of the page after switching view (optional)
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    });
    
    // Handle initial load based on URL hash
    function loadInitialView() {
        const hash = window.location.hash.substring(1); // remove #
        if (hash === 'products') {
            setActiveView('products');
        } else if (hash === 'about') {
            setActiveView('about');
        } else {
            setActiveView('home'); // default
        }
    }
    
    // Listen for hash changes (back/forward buttons)
    window.addEventListener('hashchange', function() {
        const hash = window.location.hash.substring(1);
        if (hash === 'products') setActiveView('products');
        else if (hash === 'about') setActiveView('about');
        else setActiveView('home');
    });
    
    // Call on page load
    loadInitialView();

    // ========== DARK/LIGHT MODE TOGGLE ==========
    const themeToggle = document.getElementById('themeToggle');
    const themeText = document.getElementById('themeText');
    function toggleTheme() {
        document.body.classList.toggle('light-mode');
        if (document.body.classList.contains('light-mode')) {
            themeText.innerHTML = 'Light';
            themeToggle.innerHTML = '<i class="fas fa-sun"></i> Light';
            localStorage.setItem('theme', 'light');
        } else {
            themeText.innerHTML = 'Dark';
            themeToggle.innerHTML = '<i class="fas fa-moon"></i> Dark';
            localStorage.setItem('theme', 'dark');
        }
    }
    themeToggle.addEventListener('click', toggleTheme);
    if (localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light-mode');
        themeToggle.innerHTML = '<i class="fas fa-sun"></i> Light';
    }

    // ========== REVIEW SYSTEM (unchanged) ==========
    let currentProductId = null;
    async function loadProductReviews(productId) {
        try {
            const response = await fetch(`get_reviews.php?product_id=${productId}`);
            const data = await response.json();
            if (data.success) {
                const starsDiv = document.getElementById(`stars-${productId}`);
                if (starsDiv) {
                    const fullStars = Math.floor(data.avg_rating);
                    const emptyStars = 5 - fullStars;
                    starsDiv.innerHTML = '★'.repeat(fullStars) + '☆'.repeat(emptyStars);
                }
                const countSpan = document.getElementById(`reviewCount-${productId}`);
                if (countSpan) countSpan.textContent = `(${data.total_reviews} reviews)`;
            }
        } catch(e) { console.error('Error loading reviews:', e); }
    }
    async function showReviewModal(productId, productName) {
        currentProductId = productId;
        document.getElementById('modalProductName').innerHTML = `Reviews for ${productName}`;
        document.getElementById('reviewModal').style.display = 'flex';
        try {
            const response = await fetch(`get_reviews.php?product_id=${productId}`);
            const data = await response.json();
            const reviewsList = document.getElementById('reviewsList');
            if (data.success && data.reviews.length > 0) {
                reviewsList.innerHTML = data.reviews.map(review => `
                    <div class="review-item">
                        <div class="review-user">${escapeHtml(review.user_name)}</div>
                        <div class="review-rating">${'★'.repeat(review.rating)}${'☆'.repeat(5-review.rating)}</div>
                        <div class="review-comment">${escapeHtml(review.comment)}</div>
                        <div class="review-date">${new Date(review.created_at).toLocaleDateString()}</div>
                    </div>
                `).join('');
            } else {
                reviewsList.innerHTML = '<p style="text-align:center; opacity:0.6;">No reviews yet. Be the first to review!</p>';
            }
        } catch(e) { console.error('Error:', e); }
    }
    function closeReviewModal() {
        document.getElementById('reviewModal').style.display = 'none';
        document.getElementById('reviewerName').value = '';
        document.getElementById('reviewRating').value = '5';
        document.getElementById('reviewComment').value = '';
    }
    async function submitReview() {
        const name = document.getElementById('reviewerName').value.trim();
        const rating = document.getElementById('reviewRating').value;
        const comment = document.getElementById('reviewComment').value.trim();
        if (!name) { alert('Please enter your name'); return; }
        if (!comment) { alert('Please enter your review'); return; }
        const formData = new FormData();
        formData.append('product_id', currentProductId);
        formData.append('user_name', name);
        formData.append('rating', rating);
        formData.append('comment', comment);
        try {
            const response = await fetch('submit_review.php', { method: 'POST', body: formData });
            const data = await response.json();
            if (data.success) {
                alert('Thank you for your review!');
                closeReviewModal();
                loadProductReviews(currentProductId);
            } else {
                alert('Error: ' + (data.errors || ['Unknown error']).join(', '));
            }
        } catch(e) { alert('Error submitting review'); }
    }
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    document.querySelectorAll('.product-card').forEach(card => {
        const productId = card.dataset.productId;
        if (productId) loadProductReviews(productId);
    });

    // ========== FILTER BUTTONS (Category Filters) ==========
    const filterBtns = document.querySelectorAll('.filter-btn');
    const products = document.querySelectorAll('.product-card');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const category = this.dataset.cat;
            products.forEach(product => {
                if (category === 'all' || product.dataset.category === category) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });

    // ========== FOOTER CATEGORY FILTERS ==========
    const catFilters = document.querySelectorAll('.cat-filter');
    catFilters.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            // First ensure we are on products view
            setActiveView('products');
            // Scroll to products section smoothly
            document.getElementById('productsSection').scrollIntoView({ behavior: 'smooth' });
            // Then apply filter
            const catId = this.dataset.cat;
            const filterBtn = document.querySelector(`.filter-btn[data-cat="${catId}"]`);
            if (filterBtn) filterBtn.click();
        });
    });

    // ========== COLLECTIONS LINKS (Navbar & Footer) ==========
    const collectionsLink = document.getElementById('collectionsLink');
    if (collectionsLink) {
        collectionsLink.addEventListener('click', function(e) {
            e.preventDefault();
            setActiveView('products');
            setTimeout(() => {
                const allBtn = document.querySelector('.filter-btn[data-cat="all"]');
                if (allBtn) allBtn.click();
            }, 100);
        });
    }
    const footerCollectionsLink = document.getElementById('footerCollectionsLink');
    if (footerCollectionsLink) {
        footerCollectionsLink.addEventListener('click', function(e) {
            e.preventDefault();
            setActiveView('products');
            setTimeout(() => {
                const allBtn = document.querySelector('.filter-btn[data-cat="all"]');
                if (allBtn) allBtn.click();
            }, 100);
        });
    }

    // ========== SOCIAL MEDIA ICONS (jQuery) – Open Login Pages ==========
    $(document).ready(function() {
        $('.social-icon').on('click', function(e) {
            e.preventDefault();
            const platform = $(this).data('platform');
            let url = '';
            switch(platform) {
                case 'instagram': url = 'https://www.instagram.com/accounts/login/'; break;
                case 'facebook': url = 'https://www.facebook.com/login'; break;
                case 'twitter': url = 'https://twitter.com/login'; break;
                case 'linkedin': url = 'https://www.linkedin.com/login'; break;
                case 'pinterest': url = 'https://www.pinterest.com/login/'; break;
                default: url = '#';
            }
            if (url !== '#') window.open(url, '_blank');
        });

        $('.payment-icon').on('click', function(e) {
            e.preventDefault();
            const payment = $(this).data('payment');
            let url = '';
            switch(payment) {
                case 'visa': url = 'https://www.visa.com/'; break;
                case 'mastercard': url = 'https://www.mastercard.com/'; break;
                case 'paypal': url = 'https://www.paypal.com/'; break;
                case 'easypaisa': url = 'https://www.easypaisa.com.pk/'; break;
                case 'jazzcash': url = 'https://www.jazzcash.com.pk/'; break;
                default: url = '#';
            }
            if (url !== '#') window.open(url, '_blank');
        });
    });

    // ========== OTHER EXISTING SCRIPTS (Cart, Scroll Effects, etc.) ==========
    function updateCartCount() {
        fetch('cart_count.php').then(res => res.json()).then(data => {
            const c = document.getElementById('cartCount');
            if (c) c.textContent = data.count;
        }).catch(() => {});
    }
    updateCartCount();

    // Smooth scroll for anchor links that are not used for navigation
    $('a[href^="#"]:not([data-nav])').on('click', function(e) {
        var target = $(this).attr('href');
        if (target && target !== '#' && target !== '#products' && target !== '#about' && target !== '#home') {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $(target).offset().top - 70 }, 800, 'swing');
        }
    });
    
    // Hero Zoom on Scroll (only when hero is visible)
    const hero = document.querySelector('.hero');
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (heroSection.style.display !== 'none') {
            if (!ticking) {
                requestAnimationFrame(() => {
                    const scrollY = window.scrollY;
                    const heroHeight = hero.offsetHeight;
                    if (scrollY < heroHeight) {
                        const zoomAmount = 1 + (scrollY / heroHeight) * 0.08;
                        hero.style.transform = `scale(${zoomAmount})`;
                    } else {
                        hero.style.transform = 'scale(1)';
                    }
                    ticking = false;
                });
                ticking = true;
            }
        } else {
            hero.style.transform = 'scale(1)';
        }
    });

    // Cursor Glow Effect
    const cursorGlow = document.createElement('div');
    cursorGlow.classList.add('cursor-glow');
    document.body.appendChild(cursorGlow);
    document.addEventListener('mousemove', (e) => {
        cursorGlow.style.left = e.clientX + 'px';
        cursorGlow.style.top = e.clientY + 'px';
    });
    const hoverElements = document.querySelectorAll('button, a, .product-card, .btn-add, .filter-btn');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => cursorGlow.classList.add('glow-active'));
        el.addEventListener('mouseleave', () => cursorGlow.classList.remove('glow-active'));
    });

    // Morphing Background
    const morphingBg = document.createElement('div');
    morphingBg.className = 'morphing-bg';
    for (let i = 0; i < 5; i++) {
        const blob = document.createElement('div');
        const size = Math.random() * 400 + 200;
        blob.style.width = size + 'px';
        blob.style.height = size + 'px';
        blob.style.top = Math.random() * 100 + '%';
        blob.style.left = Math.random() * 100 + '%';
        blob.style.animationDelay = Math.random() * 5 + 's';
        blob.style.animationDuration = 12 + Math.random() * 8 + 's';
        morphingBg.appendChild(blob);
    }
    document.body.insertBefore(morphingBg, document.body.firstChild);

    // Premium Confetti on Add to Cart
    function premiumConfetti() {
        for (let i = 0; i < 50; i++) {
            const confetti = document.createElement('div');
            confetti.innerHTML = ['✨', '💎', '⭐', '🎉', '💫'][Math.floor(Math.random() * 5)];
            confetti.style.position = 'fixed';
            confetti.style.left = Math.random() * window.innerWidth + 'px';
            confetti.style.top = '-20px';
            confetti.style.fontSize = (Math.random() * 24 + 12) + 'px';
            confetti.style.opacity = '1';
            confetti.style.pointerEvents = 'none';
            confetti.style.zIndex = '10000';
            confetti.style.transition = 'all 1.5s ease-out';
            confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
            document.body.appendChild(confetti);
            setTimeout(() => {
                confetti.style.top = window.innerHeight + 'px';
                confetti.style.opacity = '0';
                confetti.style.transform = `rotate(${Math.random() * 720}deg)`;
            }, 10);
            setTimeout(() => confetti.remove(), 1500);
        }
    }
    document.querySelectorAll('.btn-add').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            premiumConfetti();
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> ADDED! ✨';
            btn.style.background = 'linear-gradient(135deg, #d4af7a, #b8945a)';
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = '';
            }, 2000);
        });
    });

    // Magnetic Effect on Cards
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            card.style.transform = `translateY(-15px) rotateX(${y * 10}deg) rotateY(${x * 10}deg) scale(1.02)`;
            card.style.boxShadow = `0 20px 40px rgba(212, 175, 122, ${0.2 + Math.abs(x) * 0.3})`;
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
            card.style.boxShadow = '';
        });
    });

    // Scroll Progress Ring
    const progressRing = document.createElement('div');
    progressRing.style.cssText = `
        position: fixed; bottom: 30px; right: 30px; width: 50px; height: 50px;
        border-radius: 50%; background: rgba(0,0,0,0.5); backdrop-filter: blur(5px);
        z-index: 999; cursor: pointer; display: flex; align-items: center; justify-content: center;
        color: #d4af7a; font-size: 20px; border: 2px solid #d4af7a; transition: all 0.3s;
    `;
    progressRing.innerHTML = '↑';
    document.body.appendChild(progressRing);
    progressRing.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    window.addEventListener('scroll', () => {
        const percent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        progressRing.style.background = `conic-gradient(#d4af7a ${percent}%, rgba(0,0,0,0.5) ${percent}%)`;
        progressRing.style.transform = `scale(${1 + percent / 200})`;
    });

    // Parallax effect on mouse move
    document.addEventListener('mousemove', function(e) {
        const gold1 = document.querySelector('.hero-gold-1');
        const gold2 = document.querySelector('.hero-gold-2');
        const gold3 = document.querySelector('.hero-gold-3');
        if (gold1 && heroSection.style.display !== 'none') {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            gold1.style.transform = `translate(${x * 30}px, ${y * 30}px)`;
            gold2.style.transform = `translate(${-x * 20}px, ${-y * 20}px)`;
            gold3.style.transform = `translate(${x * 15}px, ${-y * 15}px)`;
        }
    });

    // Progress Bar
    const progressBar = document.createElement('div');
    progressBar.className = 'progress-container';
    progressBar.innerHTML = '<div class="progress-bar"></div>';
    document.body.appendChild(progressBar);
    window.addEventListener('scroll', () => {
        const winScroll = window.scrollY;
        const height = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (winScroll / height) * 100;
        document.querySelector('.progress-bar').style.width = scrolled + '%';
    });

    console.log('✨ 3-in-1 page mode active: Home | Shop | About');
</script>
</body>
</html>