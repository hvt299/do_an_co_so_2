<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="container-login forms">

        <!-- Login Form -->

        <div class="form login">
            <div class="form-content">
                <h1>Đăng nhập</h1>
                <form action="login_process.php" method="POST">
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forget password?</a>
                    </div>
                    <div class="field button-field">
                        <button name="login">Login</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Don't have an account? <a href="#" class="link signup-links">Signup now</a></span>
                </div>
            </div>
            <div class="line"></div>

            <div class="media-options">
                <a href="#" class="field facebook">
                    <i class="fa-brands fa-facebook"></i>
                    <span>Login with Facebook</span>
                </a>
            </div>
            <div class="media-options">
                <a href="#" class="field google">
                    <img src="images/google-icon.png" alt="" class="google-img">
                    <span>Login with Google</span>
                </a>
            </div>
        </div>

        <!-- Signup form -->

        <div class="form signup">
            <div class="form-content">
                <h1>Đăng ký</h1>
                <form action="signup_process.php" method="POST">
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Username" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="re-password" placeholder="Re-Password" class="password">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <div class="field button-field">
                        <button name="signup">Signup</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Already have an account? <a href="#" class="link login-links">Login now</a></span>
                </div>
            </div>
            <div class="line"></div>

            <div class="media-options">
                <a href="#" class="field facebook">
                    <i class="fa-brands fa-facebook"></i>
                    <span>Sign up with Facebook</span>
                </a>
            </div>
            <div class="media-options">
                <a href="#" class="field google">
                    <img src="images/google-icon.png" alt="" class="google-img">
                    <span>Sign up with Google</span>
                </a>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>