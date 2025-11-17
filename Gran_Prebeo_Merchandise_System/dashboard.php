<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gran Prebeo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
        }
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 1rem 0;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin: 5px 0;
            border-radius: 5px;
            padding: 10px 15px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .main-content {
            padding: 2rem;
        }
        .card-dashboard {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        .welcome-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 2rem;
            margin: -2rem -2rem 2rem -2rem;
            border-radius: 0 0 10px 10px;
        }
        .brand-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0 1.5rem;
        }
        .brand-logo {
            height: 48px;
        }
        .brand-text h4 {
            margin: 0;
        }
        .brand-text small {
            display: block;
        }
        @media (max-width: 767.98px) {
            .brand-header {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 px-0 sidebar">
                <div class="brand-header mb-4">
                    <img src="images/gran-prebeo-logo.png" alt="Gran Prebeo Logo" class="brand-logo">
                    <div class="brand-text">
                        <h4 class="text-white">Gran Prebeo</h4>
                        <small class="text-white-50">Merchandise System</small>
                    </div>
                </div>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="orders.php" class="nav-link">
                            <i class="bi bi-cart"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="customers.php" class="nav-link">
                            <i class="bi bi-people"></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="invoices.php" class="nav-link">
                            <i class="bi bi-receipt"></i> Invoices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="delivery.php" class="nav-link">
                            <i class="bi bi-truck"></i> Delivery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="reports.php" class="nav-link">
                            <i class="bi bi-graph-up"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a href="?logout=1" class="nav-link text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <div class="welcome-header">
                    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h2>
                    <p class="mb-0">Gran Prebeo Merchandise Management System</p>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-dashboard text-white bg-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Total Orders</h6>
                                        <h2>0</h2>
                                    </div>
                                    <i class="bi bi-cart3" style="font-size: 2.5rem; opacity: 0.5;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-dashboard text-white bg-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Customers</h6>
                                        <h2>0</h2>
                                    </div>
                                    <i class="bi bi-people" style="font-size: 2.5rem; opacity: 0.5;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-dashboard text-white bg-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Pending Orders</h6>
                                        <h2>0</h2>
                                    </div>
                                    <i class="bi bi-hourglass-split" style="font-size: 2.5rem; opacity: 0.5;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-dashboard text-white bg-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Revenue</h6>
                                        <h2>₱0</h2>
                                    </div>
                                    <i class="bi bi-currency-peso" style="font-size: 2.5rem; opacity: 0.5;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card card-dashboard">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">Recent Orders</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-dashboard">
                            <div class="card-header bg-white">
                                <h5 class="card-title mb-0">Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-4 mb-3">
                                        <a href="#" class="btn btn-outline-primary btn-lg p-4 w-100">
                                            <i class="bi bi-plus-circle d-block mb-2" style="font-size: 1.5rem;"></i>
                                            New Order
                                        </a>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <a href="#" class="btn btn-outline-success btn-lg p-4 w-100">
                                            <i class="bi bi-person-plus d-block mb-2" style="font-size: 1.5rem;"></i>
                                            Add Customer
                                        </a>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <a href="#" class="btn btn-outline-info btn-lg p-4 w-100">
                                            <i class="bi bi-file-earmark-text d-block mb-2" style="font-size: 1.5rem;"></i>
                                            Create Invoice
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="btn btn-outline-warning btn-lg p-4 w-100">
                                            <i class="bi bi-graph-up d-block mb-2" style="font-size: 1.5rem;"></i>
                                            View Reports
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="btn btn-outline-secondary btn-lg p-4 w-100">
                                            <i class="bi bi-gear d-block mb-2" style="font-size: 1.5rem;"></i>
                                            Settings
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="btn btn-outline-danger btn-lg p-4 w-100">
                                            <i class="bi bi-question-circle d-block mb-2" style="font-size: 1.5rem;"></i>
                                            Help
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
