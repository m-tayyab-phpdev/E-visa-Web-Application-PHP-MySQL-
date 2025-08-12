<?php
include 'format.php';
if (isset($_POST['btn-declare'])) {
    $var_multidata = $_POST['multidata'];
    list($user_id, $app_id) = explode(',', $var_multidata);
    $var_obt = $_POST['obt'];
    $result_status = "";
    if ($var_obt >= 200) {
        $result_status = "Passed";
    } else {
        $result_status = "Failed";
    }
    $result = "UPDATE `interview` SET `marks` = '$var_obt', `result_status` = '$result_status' WHERE `user_id` = '$user_id' AND `app_id` = '$app_id'";
    $run_result = mysqli_query($con, $result);
    if ($run_result) {
        $change = "Done";
        $change_status = "UPDATE `applicant_info` SET `interview` = '$change' WHERE `app_id` = '$app_id'";
        $run_change_status = mysqli_query($con, $change_status);
        if ($run_change_status) {
            echo "<script>alert('Result Declared'); window.location.replace('interviewresult.php');</script>";
        }
    }
}
?>

<style>


.form-container {
    max-width: 750px;
    margin: 100px auto;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}


.input-group-text {
    background-color: #343a40;
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



.text-center button {
    width: 100%;
}

.mb-3 label {
    font-weight: 600;
}

.input-group .form-control:focus {
    border-color: #28a745;
    box-shadow: none;
}

</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="form-container">
                <form action="" method="post">
                    <h3 style="text-align: center;" class="mb-4">Announce Result</h3>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text text-white" style="background-color: #6C757D;">CNIC</span>
                                        <select name="multidata" class="form-control" required>
                                            <option value="">---Select CNIC---</option>
                                            <?php
                                            $status = "Conducted";
                                            $sql = "SELECT * FROM `applicant_info` WHERE `interview` = '$status'";
                                            $run = mysqli_query($con, $sql);
                                            $num_row = mysqli_num_rows($run);
                                            if ($num_row > 0) {
                                                while ($row = mysqli_fetch_assoc($run)) {
                                                    echo '<option value="' . $row['user_id'] . ', ' . $row['app_id'] . '">' . $row['cnic'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No applicants found</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text text-white" style="background-color: #6C757D;">Obt Marks</span>
                                        <input type="text" class="form-control" name="obt" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="btn-declare">Declare Result</button>
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