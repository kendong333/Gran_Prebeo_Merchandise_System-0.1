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
    <title>Invoices - Gran Prebeo</title>
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
        .card-invoices {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .filters .form-control,
        .filters .form-select {
            border-radius: 8px;
        }
        .table thead {
            background-color: #f1f3f5;
        }
        .summary-boxes .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
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
                        <a href="invoices.php" class="nav-link active">
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
                        <a href="dashboard.php?logout=1" class="nav-link text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 main-content">
                <div class="page-header">
                    <h2>Invoice Center</h2>
                    <p class="mb-0">Monitor billing and payment status</p>
                </div>

                <div class="row g-3 summary-boxes">
                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #6a11cb;">
                            <div class="card-body">
                                <h6 class="card-title">Total Invoices</h6>
                                <h3 class="mb-0">0</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #2575fc;">
                            <div class="card-body">
                                <h6 class="card-title">Paid</h6>
                                <h3 class="mb-0">0</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #f39c12;">
                            <div class="card-body">
                                <h6 class="card-title">Pending</h6>
                                <h3 class="mb-0">0</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white" style="background-color: #e74c3c;">
                            <div class="card-body">
                                <h6 class="card-title">Overdue</h6>
                                <h3 class="mb-0">0</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 filters mt-4">
                    <div class="col-md-4">
                        <label class="form-label">Search Invoices</label>
                        <input type="text" class="form-control" placeholder="Search by invoice ID or customer" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Payment Status</label>
                        <select class="form-select" disabled>
                            <option selected>All statuses</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date Range</label>
                        <input type="date" class="form-control" disabled>
                    </div>
                </div>

                <div class="card card-invoices mt-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Invoices List</h5>
                        <button class="btn btn-info btn-sm text-white" disabled>
                            <i class="bi bi-file-earmark-plus"></i> New Invoice
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Customer</th>
                                        <th>Date Issued</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
