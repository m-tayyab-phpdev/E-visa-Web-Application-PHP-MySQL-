<style>
    .strength-bar {
        height: 5px;
        background: #ddd;
        border-radius: 5px;
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
</style>
<?php
include 'format.php';


if (isset($_POST['btn-upd'])) {
    $var_id = $_POST['id'];
    $var_name = $_POST['name'];
    $var_email = $_POST['email'];
    $var_phone = $_POST['phone'];

    $upd = "UPDATE `users` SET `user_name` = '$var_name', `user_email` = '$var_email', `user_phone` = '$var_phone' WHERE `user_id` = '$var_id'";
    $run_upd = mysqli_query($con, $upd);
    if ($run_upd) {
        echo "<script>alert('Record updated'); window.location.replace('hr.php');</script>";
    }
}


if (isset($_GET['del'])) {
    $var_id = $_GET['del'];
    $del = "DELETE FROM `users` WHERE `user_id` = '$var_id'";
    $run_del = mysqli_query($con, $del);
    if ($run_del) {
        echo "<script>alert('Record deleted'); window.location.replace('hr.php');</script>";
    }
}

?>
<style>
    .d-flex {
        display: none;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter">
                <div class="row mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            HR details
                            <?php
                            if (isset($_SESSION['msg']) && isset($_SESSION['color'])) {
                                echo '<div class="alert alert-' . $_SESSION['color'] . '">';
                                echo '<div class="text-center">' . $_SESSION['msg'] . '</div>';
                                echo '</div>';
                                unset($_SESSION['msg']);
                                unset($_SESSION['color']);
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-info form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">Register new HR</button>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form action="php/registerbackend.php" method="post">
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
                                                <div class="strength-bar mt-2">
                                                    <span id="strength-level"></span>
                                                </div>
                                                <small class="text-muted" id="strength-text">Enter a strong password</small>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="btn-register" class="btn btn-primary">Register now</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>





                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone #</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `users` WHERE `user_type` = 'HR'";
                                $run = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_assoc($run)) {
                                    echo '<tr class="text-center">
    <td>' . $row['user_name'] . '</td>
    <td>' . $row['user_email'] . '</td>
    <td>' . $row['user_phone'] . '</td>
    <td><a type="button" class="text-success" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#upd' . $row['user_id'] . '">
  Update
</a></td>
    <td><a href="hr.php?del=' . $row['user_id'] . '" class="text-danger" style="font-weight: bold;">Delete</a></td>
</tr>




<div class="modal fade" id="upd' . $row['user_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">



<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Name</span>
  <input type="text" class="form-control" value="' . $row['user_name'] . '" name="name">
</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Email</span>
  <input type="email" class="form-control" value="' . $row['user_email'] . '" name="email">
</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Phone</span>
  <input type="text" class="form-control" value="' . $row['user_phone'] . '" name="phone">
</div>

<input type="hidden" name="id" value="' . $row['user_id'] . '">


        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn-upd">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>



';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Vitrrual University of Pakistan </div>
            </div>
        </div>
    </footer>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const strengthBar = document.getElementById('strength-level');
    const strengthText = document.getElementById('strength-text');

    passwordInput.addEventListener('input', () => {
        const password = passwordInput.value;
        let strength = 0;

        // Check password conditions
        if (/[a-z]/.test(password)) strength++; // Lowercase letter
        if (/[A-Z]/.test(password)) strength++; // Uppercase letter
        if (/\d/.test(password)) strength++; // Number
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++; // Special character

        // Password length thresholds
        if (password.length >= 8 && strength >= 4) {
            strengthBar.className = 'strength-bar strong';
            strengthText.textContent = 'Strong';
        } else if (password.length >= 6 && strength >= 3) {
            strengthBar.className = 'strength-bar medium';
            strengthText.textContent = 'Medium';
        } else if (password.length >= 4) {
            strengthBar.className = 'strength-bar weak';
            strengthText.textContent = 'Weak';
        } else {
            strengthBar.className = 'strength-bar';
            strengthText.textContent = 'Enter a strong password';
        }
    });
</script>