<?php
require_once 'config/database.php';
header('Content-Type: application/json');

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Get average rating
    $stmt = $pdo->prepare("SELECT AVG(rating) as avg_rating, COUNT(*) as total FROM reviews WHERE product_id = ?");
    $stmt->execute([$product_id]);
    $stats = $stmt->fetch();
    
    // Get all reviews
    $stmt = $pdo->prepare("SELECT id, user_name, rating, comment, created_at FROM reviews WHERE product_id = ? ORDER BY id DESC");
    $stmt->execute([$product_id]);
    $reviews = $stmt->fetchAll();
    
    echo json_encode([
        'success' => true,
        'avg_rating' => round($stats['avg_rating'] ?? 0, 1),
        'total_reviews' => $stats['total'] ?? 0,
        'reviews' => $reviews
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Product ID required']);
}
?>