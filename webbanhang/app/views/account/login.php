<?php include 'app/views/shares/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #2b2d42 0%, #4b5e8e 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 1.2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            padding: 2rem;
            margin-top: 2rem;
        }
        .login-card h2 {
            color: #2b2d42;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .text-muted {
            color: #6b7280 !important;
            font-size: 0.9rem;
        }
        .form-control {
            border-radius: 0.6rem;
            border: 1px solid #e5e7eb;
            padding: 0.8rem;
            transition: all 0.2s ease-in-out;
        }
        .form-control:focus {
            border-color: #4b5e8e;
            box-shadow: 0 0 0 3px rgba(75, 94, 142, 0.2);
        }
        .form-label {
            color: #2b2d42;
            font-weight: 500;
            font-size: 0.9rem;
        }
        .btn-primary {
            background: #4b5e8e;
            border: none;
            border-radius: 0.6rem;
            padding: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #2b2d42;
            transform: translateY(-1px);
        }
        .forgot-password, .signup-link {
            color: #4b5e8e;
            font-weight: 500;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .forgot-password:hover, .signup-link:hover {
            color: #2b2d42;
            text-decoration: underline;
        }
        .social-login a {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            border-radius: 50%;
            color: #2b2d42;
            transition: all 0.3s ease;
        }
        .social-login a:hover {
            background: #4b5e8e;
            color: white;
            transform: scale(1.05);
        }
        @media (max-width: 576px) {
            .login-card {
                padding: 1.5rem;
            }
            .form-control {
                padding: 0.7rem;
            }
            .btn-primary {
                padding: 0.7rem;
            }
        }
    </style>
</head>

<section class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="login-card">
                    <h2 class="text-center">Welcome Back</h2>
                    <p class="text-center text-muted mb-4">Sign in to your account</p>
                    <form action="/webbanhang/account/checklogin" method="post">
                        <div class="mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required />
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="#!" class="forgot-password">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary w-100 mb-4" type="submit">Sign In</button>
                        <div class="social-login d-flex justify-content-center gap-3 mb-4">
                            <a href="#!"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#!"><i class="fab fa-google fa-lg"></i></a>
                        </div>
                        <p class="text-center mb-0">Don't have an account? <a href="/webbanhang/account/register" class="signup-link">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>