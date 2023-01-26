<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <br><br><br><br><br>
    <div class="container">
        <div class="card text-center w-50 m-auto">
            <div class="card-header">
                <h1 class="card-title">Register</h1>
            </div>
            <div class="card-body">
                <form action="" method="post">

                    <p>Create your account. It's free and only takes a minute.</p>

                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="first_name" placeholder=" " value="" required>
                                <label for="first_name">First Name</label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="first_name" placeholder=" " value="" required>
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" placeholder=" " required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" placeholder=" " required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="cpassword" placeholder="Password" required>
                        <label for="cpassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="cpassword" placeholder="Password" required>
                        <label for="cpassword">Confirm Password</label>
                    </div>
                    <div class="form-check text-start mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I accept the Terms of Use & Privacy Policy
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register Now</button>

                </form>
            </div>
            <div class="card-footer text-muted">
                <a href="../" class=""><i class="fa-solid fa-backward-step"></i> Go back to Login</a>
            </div>
        </div>
    </div>
</body>
</html>