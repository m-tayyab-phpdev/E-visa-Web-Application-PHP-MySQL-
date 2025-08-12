<?php
session_start();
include_once 'php/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Visa Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0a0f2c, #2c3b63);
            color: white;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
        }

        .a-tag {
            text-decoration: none;
            color: whitesmoke;
            font-weight: 500;
        }

        .a-tag:hover {
            color: #eb8317;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 15px;
            padding: 2rem;
            width: 400px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
        }

        .card h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: whitesmoke;
        }

        .input-group-text {
            background-color: #2c3b63;
            color: white;
        }

        .btn-dark {
            background-color: #1b2a49;
            border: none;
            font-weight: bold;
        }

        .btn-dark:hover {
            background-color: #eb8317;
            color: #10375c;
            border: none;
            font-weight: bold;
        }

        .form-group {
            width: 100%;
        }

        .strength-bar {
            height: 5px;
            background: #ddd;
            border-radius: 5px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-bar span {
            display: block;
            height: 100%;
            transition: width 0.3s ease;
        }

        .weak {
            background: #ff4d4d;
            width: 33%;
        }

        .medium {
            background: #ffc107;
            width: 66%;
        }

        .strong {
            background: #4caf50;
            width: 100%;
        }

        .strength-text {
            font-size: 12px;
            margin-top: 5px;
            color: white;
        }

        .password-tips {
            margin-top: 15px;
            font-size: 14px;
            color: #ccc;
        }

        .password-tips li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <a href="index.php" style="text-decoration: none; text-align:center;">
                    <h2>E-Visa Registration</h2>
                </a>
                <form action="php/registerbackend.php" method="post">
                    <?php
                    if (isset($_SESSION['msg']) && isset($_SESSION['color'])) {
                        echo '<div class="alert alert-' . $_SESSION['color'] . '">';
                        echo '<div class="text-center">' . $_SESSION['msg'] . '</div>';
                        echo '</div>';
                        unset($_SESSION['msg']);
                        unset($_SESSION['color']);
                    }
                    ?>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                        </div>
                        <div class="strength-bar">
                            <span id="strength-level"></span>
                        </div>
                        <div class="strength-text" id="strength-text">Enter a strong password</div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required>
                        </div>
                    </div>
                    <div class="anchor">
                        <p>Already have an account? <a href="login.php" class="a-tag">&nbsp;Login</a></p>
                    </div>
                    <button type="submit" class="btn btn-dark w-100" name="btn-register">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('strength-level');
        const strengthText = document.getElementById('strength-text');

        passwordInput.addEventListener('input', () => {
            const password = passwordInput.value;
            let strength = 0;

            if (/[a-z]/.test(password)) strength++; 
            if (/[A-Z]/.test(password)) strength++; 
            if (/\d/.test(password)) strength++;    
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++; 

            if (password.length >= 8 && strength >= 4) {
                strengthBar.className = 'strong';
                strengthText.textContent = 'Strong';
            } else if (password.length >= 6 && strength >= 3) {
                strengthBar.className = 'medium';
                strengthText.textContent = 'Medium';
            } else if (password.length >= 4) {
                strengthBar.className = 'weak';
                strengthText.textContent = 'Weak';
            } else {
                strengthBar.className = '';
                strengthText.textContent = 'Enter a strong password';
            }
        });
    </script>
</body>

</html>
