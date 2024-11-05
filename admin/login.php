<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Admin Login</title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the body */
        }

        .gradient-custom-2 {
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        .card {
            border: none; /* Remove card border */
            border-radius: 1rem; /* Rounded corners for the card */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border: none; /* Remove border */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .text-muted {
            text-decoration: none; /* Remove underline from link */
        }

        .text-muted:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-5 col-lg-6 col-md-8 col-12 mx-auto">
                    <div class="card rounded-3 shadow">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 150px;" alt="logo">
                                <h4 class="mt-3 mb-4">Welcome Back!</h4>
                            </div>

                            <?php if(isset($_GET['error'])): ?>
                                <div class="alert alert-danger text-white text-center py-2">
                                    Invalid username or password
                                </div>
                            <?php endif; ?>

                            <form action="model/login.php" method="post">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username"  name="username" class="form-control" placeholder="Enter your username" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password"    class="form-control" placeholder="Enter your password" required />
                                </div>
                                <div class="text-center pt-1 mb-4">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                </div>

                                <div class="text-center">
                                    <a class="text-muted" href="#!">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
