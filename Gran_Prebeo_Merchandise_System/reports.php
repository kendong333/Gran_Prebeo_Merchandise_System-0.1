<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Gran Prebeo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .main-content {
            padding: 2rem;
        }
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 1.5rem 2rem;
            margin: -2rem -2rem 2rem -2rem;
            border-radius: 0 0 10px 10px;
        }
        .summary-cards .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            color: white;
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
        .filters .form-control,
        .filters .form-select {
            border-radius: 8px;
        }
        .card-report {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .chart-placeholder {
            height: 280px;
            border-radius: 10px;
            background: repeating-linear-gradient(135deg, rgba(106, 17, 203, 0.15), rgba(106, 17, 203, 0.15) 10px, rgba(37, 117, 252, 0.1) 10px, rgba(37, 117, 252, 0.1) 20px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(0,0,0,0.35);
            font-weight: 600;
            letter-spacing: 0.05rem;
        }
        .actions .btn {
            border-radius: 30px;
        }
        .table thead {
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
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
                        <a href="dashboard.php" class="nav-link">
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
                        <a href="reports.php" class="nav-link active">
                            <i class="bi bi-graph-up"></i> Reports
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a href="dashboard.php?logout=1" class="nav-link text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 main-content">
                <div class="page-header">
                    <h2>Reports & Analytics</h2>
                    <p class="mb-0">Visualize sales performance and customer trends</p>
                </div>

                <div class="row g-3 summary-cards">
                    <div class="col-md-3">
                        <div class="card" style="background-color: #6a11cb;">
                            <div class="card-body">
                                <h6 class="card-title">Total Revenue</h6>
                                <h3 class="mb-0">₱0</h3>
                                <small class="text-white-50">vs last period 0%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #2575fc;">
                            <div class="card-body">
                                <h6 class="card-title">Orders</h6>
                                <h3 class="mb-0">0</h3>
                                <small class="text-white-50">Completed</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #f39c12;">
                            <div class="card-body">
                                <h6 class="card-title">New Customers</h6>
                                <h3 class="mb-0">0</h3>
                                <small class="text-white-50">This month</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="background-color: #e74c3c;">
                            <div class="card-body">
                                <h6 class="card-title">Returns</h6>
                                <h3 class="mb-0">0</h3>
                                <small class="text-white-50">Items</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 filters mt-4 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Date Range</label>
                        <input type="date" class="form-control" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Report Type</label>
                        <select class="form-select" disabled>
                            <option selected>Sales Performance</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Export</label>
                        <div class="d-flex gap-2 actions">
                            <button class="btn btn-outline-primary w-100" disabled>
                                <i class="bi bi-file-earmark-pdf"></i> Export PDF
                            </button>
                            <button class="btn btn-outline-success w-100" disabled>
                                <i class="bi bi-file-earmark-excel"></i> Export Excel
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 g-4">
                    <div class="col-lg-8">
                        <div class="card card-report">
                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Sales Trend</h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-placeholder">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-report h-100">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Top Products</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th class="text-end">Sales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="text-center text-muted"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-report mt-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Report Actions</h5>
                        <button class="btn btn-primary btn-sm" disabled>
                            <i class="bi bi-plus-circle"></i> Create Custom Report
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <h6>Monthly Summary</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <h6>Customer Insights</h6>  
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <h6>Sales Forecast</h6> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
