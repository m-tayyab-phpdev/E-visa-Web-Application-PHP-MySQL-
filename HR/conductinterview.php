<?php
include 'format.php';
if (isset($_POST['btn-sch'])) {
    $var_cnic = $_POST['cnic'];
    $var_date = $_POST['date'];
    $var_time = $_POST['time'];
    $var_cmt = $_POST['cmt'];
    $app_status = "Not Schedule"; 

if($var_cnic != ""){
    $fetch = "SELECT `app_id`, `user_id` FROM `applicant_info` WHERE `cnic` = '$var_cnic' AND `interview` = '$app_status'";
    $run_fetch = mysqli_query($con, $fetch);
    if ($run_fetch) {
        $data = mysqli_fetch_assoc($run_fetch);
        $var_appid = $data['app_id'];
        $var_user = $data['user_id'];
        $go = "INSERT INTO `interview`(`inter_date`, `inter_time`, `inter_cmt`, `user_id`, `app_id`) VALUES ('$var_date','$var_time','$var_cmt','$var_user','$var_appid')";
        $run_go = mysqli_query($con, $go);
        if ($run_go) {
            $interview_status = "Scheduled";
            $change = "UPDATE `applicant_info` SET `interview` = '$interview_status' WHERE `app_id` = '$var_appid'";
            $run_change = mysqli_query($con, $change);
            if ($change) {
                echo "<script>alert('Interview Scheduled Successfully'); window.location.replace('conductinterview.php');</script>";
            }
        }
    } else {
        echo "<script>alert('fetching failed'); window.location.replace('conductinterview.php');</script>";
    }
}else{
    echo "<script>alert('Select CNIC first'); window.location.replace('conductinterview.php');</script>";
}
}
?>

<style>

    .form-container {
        max-width: 950px;
        margin: 20px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #343a40;
        color: #ffffff;
        font-weight: 600;
        font-size: 1.3rem;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
        padding: 15px;
    }

    .input-group-text {
        background-color: #6c757d;
        color: #ffffff;
        border: none;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .form-container h3 {
        color: #343a40;
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

    .input-group .form-control:focus {
        border-color: #28a745;
        box-shadow: none;
    }

    .form-container textarea {
        resize: none;
    }

    .mb-3 label {
        font-weight: 600;
    }

    .text-center button {
        width: 100%;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

        <div class="form-container">
    <form action="" method="post">
        <h3>Schedule Interview</h3>

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">CNIC</span>
                        <select id="cnic" name="cnic" class="form-control" required>
                            <option value="">---Select CNIC---</option>
                            <?php
                            $x = "process.png";
                            $y = "Not Schedule";
                            $status = mysqli_real_escape_string($con, $x);
                            $sql = "SELECT * FROM `applicant_info` WHERE `application_status` = '$status' AND `interview` = '$y'";
                            $run = mysqli_query($con, $sql);
                            $num_row = mysqli_num_rows($run);
                            if ($num_row > 0) {
                                while ($row = mysqli_fetch_assoc($run)) {
                                    echo '<option value="' . $row['cnic'] . '">' . $row['cnic'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No record found</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text">Date</span>
                            <input type="date" id="date" class="form-control" name="date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text">Time</span>
                            <input type="time" id="time" class="form-control" name="time" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <textarea id="cmt" name="cmt" class="form-control" rows="3"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" name="btn-sch" class="btn btn-primary">Schedule</button>
                </div>
            </div>
        </div>
    </form>
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