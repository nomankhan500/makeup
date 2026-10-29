<?php 
session_start(); 
if(!isset($_SESSION['admin_logged_in'])) header("Location: index.php"); 
require_once '../config/database.php'; 

// Create uploads directory if not exists
$upload_dir = 'uploads/';  // ← FIXED: '../' hata diya
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $name = $_POST['name']; 
    $description = $_POST['description']; 
    $price = $_POST['price']; 
    $category_id = $_POST['category_id']; 
    $badge = $_POST['badge']; 
    $is_trending = isset($_POST['is_trending']) ? 1 : 0; 
    
    // Handle image upload
    $image_path = null;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['product_image'];
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($file_extension, $allowed)) {
            $file_name = time() . '_' . rand(1000, 9999) . '.' . $file_extension;
            $target_path = $upload_dir . $file_name;
            
            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $image_path = 'uploads/' . $file_name;
            }
        }
    }
    
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category_id, badge, is_trending, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)"); 
    $stmt->execute([$name, $description, $price, $category_id, $badge, $is_trending, $image_path]); 
    header("Location: products.php"); 
    exit; 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product | Jenny's Glam Admin</title>
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
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
            color: #e8e0d8;
            min-height: 100vh;
            padding: 2rem;
        }

        h1, h2, h3, .form-title {
            font-family: 'Playfair Display', serif;
        }

        .form-container {
            max-width: 700px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border-radius: 32px;
            padding: 2.5rem;
            border: 1px solid rgba(212, 175, 122, 0.2);
            box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-title {
            font-size: 2.2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff, #d4af7a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .form-subtitle {
            text-align: center;
            color: rgba(232, 224, 216, 0.5);
            font-size: 0.8rem;
            letter-spacing: 2px;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            color: #d4af7a;
        }

        .form-group label i {
            margin-right: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.9rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(212, 175, 122, 0.2);
            border-radius: 16px;
            color: #e8e0d8;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #d4af7a;
            box-shadow: 0 0 15px rgba(212, 175, 122, 0.15);
            background: rgba(255, 255, 255, 0.08);
        }

        .file-input-wrapper input[type="file"] {
            padding: 0.8rem;
            cursor: pointer;
        }

        .file-input-wrapper input[type="file"]::file-selector-button {
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            color: #0a0a0a;
            font-weight: 600;
            cursor: pointer;
            margin-right: 1rem;
            transition: all 0.3s;
        }

        .image-preview {
            margin-top: 1rem;
            display: none;
        }

        .image-preview img {
            max-width: 150px;
            border-radius: 12px;
            border: 2px solid #d4af7a;
            padding: 4px;
            background: #0a0a0a;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 0.5rem;
        }

        .checkbox-group input {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #d4af7a;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            border: none;
            border-radius: 50px;
            color: #0a0a0a;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 122, 0.3);
        }

        .back-link {
            display: inline-block;
            margin-top: 1.5rem;
            text-align: center;
            width: 100%;
            color: rgba(232, 224, 216, 0.6);
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .back-link:hover {
            color: #d4af7a;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 1.5rem;
            }
            .form-title {
                font-size: 1.6rem;
            }
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1 class="form-title">
        <i class="fas fa-plus-circle"></i> Add New Product
    </h1>
    <div class="form-subtitle">CREATE A NEW PRODUCT FOR YOUR STORE</div>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label><i class="fas fa-tag"></i> Product Name</label>
            <input type="text" name="name" placeholder="e.g., Velvet Matte Lipstick" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-align-left"></i> Description</label>
            <textarea name="description" rows="3" placeholder="Describe your product..."></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><i class="fas fa-dollar-sign"></i> Price</label>
                <input type="number" step="0.01" name="price" placeholder="0.00" required>
            </div>

            <div class="form-group">
                <label><i class="fas fa-folder"></i> Category</label>
                <select name="category_id" required>
                    <option value="">Select Category</option>
                    <?php 
                    $cats = $pdo->query("SELECT * FROM categories ORDER BY name");
                    while($cat = $cats->fetch()): 
                    ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><i class="fas fa-medal"></i> Badge</label>
                <input type="text" name="badge" placeholder="New, Bestseller, Limited, Trending">
            </div>

            <div class="form-group">
                <label><i class="fas fa-image"></i> Product Image</label>
                <div class="file-input-wrapper">
                    <input type="file" name="product_image" id="product_image" accept="image/*" onchange="previewImage(this)">
                </div>
                <div class="image-preview" id="imagePreview">
                    <img id="previewImg" src="#" alt="Preview">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox-group">
                <input type="checkbox" name="is_trending" id="is_trending">
                <label for="is_trending"><i class="fas fa-fire"></i> Mark as Trending</label>
            </div>
        </div>

        <button type="submit" class="submit-btn">
            <i class="fas fa-save"></i> Add Product
        </button>
    </form>

    <a href="products.php" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Products
    </a>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>