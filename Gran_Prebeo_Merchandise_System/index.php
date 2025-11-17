<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gran Prebeo - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .logo h2 {
            color: #333;
            font-weight: 600;
        }
        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 0.25rem rgba(37, 117, 252, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            padding: 10px 20px;
            font-weight: 500;
            width: 100%;
            margin-top: 10px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #5a0db1 0%, #1a65e0 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="logo">
                <h2>Gran Prebeo</h2>
                <p class="text-muted">Merchandise Management System</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required 
                           placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required 
                           placeholder="••••••••">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="login" class="btn btn-primary btn-login">
                        Sign In
                    </button>
                </div>
                <div class="text-center mt-3">
                    <p class="text-muted"></p>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
