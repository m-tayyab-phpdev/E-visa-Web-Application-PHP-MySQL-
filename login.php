<?php
session_start();
include_once 'php/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Visa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('img/travel.jpg') no-repeat center center/cover;
            color: white;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            width: 380px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card h2 {
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            color: black;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 8px;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0,);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            box-shadow: none;
            border: none;
            color: white;
        }

        .btn-dark {
            background:rgb(23, 97, 235);
            border: none;
            font-weight: bold;
            border-radius: 8px;
            padding: 0.75rem;
        }

        .btn-dark:hover {
            background: rgb(22, 87, 209);
            color: white;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>E-Visa Login</h2>
        <form action="php/loginbackend.php" method="post">
            <?php
            if (isset($_SESSION['msg']) && isset($_SESSION['color'])) {
                echo '<div class="alert alert-' . $_SESSION['color'] . ' text-center">' . $_SESSION['msg'] . '</div>';
                unset($_SESSION['msg']);
                unset($_SESSION['color']);
            }
            ?>
            <div class="form-group mb-3">
                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100" name="btn-login">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
