<?php include 'app/views/shares/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        .login-card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-top: 3rem;
        }
        .login-card h2 {
            color: #3b3b3b;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .form-control {
            border-radius: 0.6rem;
            border: 1px solid #ccc;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #5e9dfc;
            box-shadow: 0 0 0 3px rgba(94, 157, 252, 0.25);
        }
        .btn-primary {
            background-color: #5e9dfc;
            border: none;
            border-radius: 0.6rem;
            padding: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #3a7be0;
        }
        .forgot-password,
        .signup-link {
            font-size: 0.9rem;
            color: #5e9dfc;
            text-decoration: none;
        }
        .forgot-password:hover,
        .signup-link:hover {
            text-decoration: underline;
        }
        .social-login a {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555;
            transition: all 0.3s ease;
        }
        .social-login a:hover {
            background: #5e9dfc;
            color: #fff;
        }
        @media (max-width: 576px) {
            .login-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<section class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="login-card">
                    <h2 class="text-center mb-3">Welcome Back</h2>
                    <p class="text-center text-muted mb-4">Please login to your account</p>
                    <form action="/webbanhang/account/checklogin" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#!" class="forgot-password">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary w-100 mb-4" type="submit">Sign In</button>
                        <div class="social-login d-flex justify-content-center gap-3 mb-4">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                        </div>
                        <p class="text-center">Don't have an account? 
                            <a href="/webbanhang/account/register" class="signup-link">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
