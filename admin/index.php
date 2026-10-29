<?php 
session_start(); 
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require_once '../config/database.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Jenny's Glam</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #0a0a0a; color: #e8e0d8; }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100%;
            background: linear-gradient(180deg, #0f0f1a 0%, #0a0a0a 100%);
            border-right: 1px solid rgba(212, 175, 122, 0.15);
            padding: 2rem 1.5rem;
            z-index: 100;
        }
        
        .sidebar h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, #ffffff, #d4af7a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.9rem 1rem;
            color: #e8e0d8;
            text-decoration: none;
            margin: 0.5rem 0;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .sidebar a i {
            width: 24px;
            font-size: 1.1rem;
        }
        
        .sidebar a:hover,
        .sidebar a.active {
            background: linear-gradient(135deg, #d4af7a, #b8945a);
            color: #0a0a0a;
            transform: translateX(5px);
        }
        
        .sidebar a.logout {
            margin-top: 2rem;
            border-top: 1px solid rgba(212, 175, 122, 0.2);
            border-radius: 0;
            padding-top: 1.5rem;
            color: #ff6b6b;
        }
        
        .sidebar a.logout:hover {
            background: #ff4444;
            color: white;
        }
        
        /* Content */
        .content {
            margin-left: 280px;
            padding: 2rem;
        }
        
        .content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .content > p {
            color: rgba(232, 224, 216, 0.6);
            margin-bottom: 2rem;
        }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid rgba(212, 175, 122, 0.1);
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(212, 175, 122, 0.3);
        }
        
        .stat-card i {
            font-size: 2.5rem;
            color: #d4af7a;
            margin-bottom: 0.8rem;
        }
        
        .stat-card h3 {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.6;
            margin-bottom: 0.5rem;
        }
        
        .stat-card .number {
            font-size: 2.2rem;
            font-weight: 700;
            color: #d4af7a;
        }
        
        /* Status Badge */
        .status-pending { background: rgba(255, 170, 0, 0.2); color: #ffaa00; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        .status-processing { background: rgba(255, 136, 0, 0.2); color: #ff8800; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        .status-shipped { background: rgba(0, 204, 255, 0.2); color: #00ccff; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        .status-delivered { background: rgba(0, 255, 136, 0.2); color: #00ff88; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        .status-cancelled { background: rgba(255, 68, 68, 0.2); color: #ff4444; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        
        @media (max-width: 768px) {
            .sidebar { width: 80px; padding: 1rem; }
            .sidebar h2 { display: none; }
            .sidebar a span { display: none; }
            .sidebar a i { font-size: 1.3rem; }
            .content { margin-left: 80px; }
            .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Jenny's Admin</h2>
    <a href="index.php" class="active"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a>
    <a href="products.php"><i class="fas fa-box"></i> <span>Products</span></a>
    <a href="categories.php"><i class="fas fa-tags"></i> <span>Categories</span></a>
    <a href="orders.php"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a>
    <a href="reports.php"><i class="fas fa-chart-bar"></i> <span>Reports</span></a>
    <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
</div>

<div class="content">
    <h1>Welcome Back, Admin</h1>
    <p>Here's what's happening with your store today.</p>
    
    <div class="stats-grid">
        <?php
        // FIXED: Using correct column names (order_status instead of status)
        $totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
        $totalOrders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
        $totalClients = $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn();
        $totalRevenue = $pdo->query("SELECT SUM(total_amount) FROM orders WHERE order_status = 'delivered'")->fetchColumn();
        $pendingOrders = $pdo->query("SELECT COUNT(*) FROM orders WHERE order_status = 'pending'")->fetchColumn();
        ?>
        <div class="stat-card">
            <i class="fas fa-box"></i>
            <h3>Total Products</h3>
            <div class="number"><?php echo $totalProducts ?: 0; ?></div>
        </div>
        <div class="stat-card">
            <i class="fas fa-shopping-cart"></i>
            <h3>Total Orders</h3>
            <div class="number"><?php echo $totalOrders ?: 0; ?></div>
        </div>
        <div class="stat-card">
            <i class="fas fa-users"></i>
            <h3>Total Clients</h3>
            <div class="number"><?php echo $totalClients ?: 0; ?></div>
        </div>
        <div class="stat-card">
            <i class="fas fa-dollar-sign"></i>
            <h3>Total Revenue</h3>
            <div class="number">$<?php echo number_format($totalRevenue ?? 0, 2); ?></div>
        </div>
        <div class="stat-card">
            <i class="fas fa-clock"></i>
            <h3>Pending Orders</h3>
            <div class="number"><?php echo $pendingOrders ?: 0; ?></div>
        </div>
    </div>
    
    <!-- Recent Orders Table -->
    <div style="margin-top: 2rem;">
        <h2 style="font-family: 'Playfair Display', serif; font-size: 1.3rem; margin-bottom: 1rem;">Recent Orders</h2>
        <div style="background: rgba(255,255,255,0.03); border-radius: 16px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(212,175,122,0.2);">
                        <th style="padding: 1rem; text-align: left;">Order ID</th>
                        <th style="padding: 1rem; text-align: left;">Customer</th>
                        <th style="padding: 1rem; text-align: left;">Date</th>
                        <th style="padding: 1rem; text-align: left;">Total</th>
                        <th style="padding: 1rem; text-align: left;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // FIXED: Using order_status instead of status
                    $recentOrders = $pdo->query("SELECT o.*, c.name as client_name FROM orders o LEFT JOIN clients c ON o.client_id = c.id ORDER BY o.id DESC LIMIT 5");
                    while($order = $recentOrders->fetch()):
                        $statusClass = '';
                        switch($order['order_status']) {
                            case 'pending': $statusClass = 'status-pending'; break;
                            case 'processing': $statusClass = 'status-processing'; break;
                            case 'shipped': $statusClass = 'status-shipped'; break;
                            case 'delivered': $statusClass = 'status-delivered'; break;
                            case 'cancelled': $statusClass = 'status-cancelled'; break;
                            default: $statusClass = 'status-pending';
                        }
                    ?>
                    <tr style="border-bottom: 1px solid rgba(232,224,216,0.05);">
                        <td style="padding: 1rem;">#<?php echo $order['id']; ?></td>
                        <td style="padding: 1rem;"><?php echo htmlspecialchars($order['client_name'] ?? 'Guest'); ?></td>
                        <td style="padding: 1rem;"><?php echo date('d M Y', strtotime($order['order_date'])); ?></td>
                        <td style="padding: 1rem;">$<?php echo number_format($order['total_amount'], 2); ?></td>
                        <td style="padding: 1rem;"><span class="<?php echo $statusClass; ?>"><?php echo ucfirst($order['order_status']); ?></span></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>