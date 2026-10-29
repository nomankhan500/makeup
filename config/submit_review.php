<?php
require_once 'config/database.php';
header('Content-Type: application/json');
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $user_name = trim($_POST['user_name']);
    $rating = $_POST['rating'];
    $comment = trim($_POST['comment']);
    $errors = [];
    
    if(empty($user_name)) $errors[] = "Name is required";
    if(empty($comment)) $errors[] = "Comment is required";
    if($rating < 1 || $rating > 5) $errors[] = "Invalid rating";
    
    if(empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO reviews (product_id, user_name, rating, comment) VALUES (?, ?, ?, ?)");
        $stmt->execute([$product_id, $user_name, $rating, $comment]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'errors' => $errors]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>