<?php include 'app/views/shares/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        .register-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-top: 3rem;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .form-control {
            border-radius: 0.6rem;
            padding: 0.75rem;
            border: 1px solid #ccc;
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
        }
        .btn-primary:hover {
            background-color: #3a7be0;
        }
        ul.error-list {
            padding: 0;
            list-style: none;
        }
        ul.error-list li {
            color: red;
            font-size: 0.95rem;
        }
    </style>
</head>

<section class="vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                <div class="register-card">
                    <h2 class="text-center mb-4">Create Your Account</h2>

                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul class="error-list">
                            <?php foreach ($errors as $err): ?>
                                <li><?= htmlspecialchars($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <form action="/webbanhang/account/save" method="post">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="username" class="form-label">Username</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="username" 
                                    name="username" 
                                    placeholder="Enter username" 
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="fullname" 
                                    name="fullname" 
                                    placeholder="Enter full name" 
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Enter password" 
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <label for="confirmpassword" class="form-label">Confirm Password</label>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    id="confirmpassword" 
                                    name="confirmpassword" 
                                    placeholder="Confirm password" 
                                    required>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                        <p class="text-center mt-3">
                            Already have an account? <a href="/webbanhang/account/login" class="text-primary">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>
