<?php
include 'format.php';
$sql = ["SELECT * FROM `applicant_info`", "SELECT * FROM `users` WHERE `user_type` = 'HR'", "SELECT * FROM `applicant_info` WHERE `application_status` = 'closed.png'", "SELECT * FROM `applicant_info` WHERE `application_status` = 'pending'", "SELECT * FROM `applicant_info` WHERE `interview` = 'Done'", "SELECT * FROM `applicant_info` WHERE `visa_status` = 'Visa Issued'"];
$run_applicant = mysqli_query($con, $sql[0]);
$run_hr = mysqli_query($con, $sql[1]);
$run_appclose = mysqli_query($con, $sql[2]);
$run_apppending = mysqli_query($con, $sql[3]);
$run_inter = mysqli_query($con, $sql[4]);
$run_visa = mysqli_query($con, $sql[5]);
$row_applicant = mysqli_num_rows($run_applicant);
$row_hr = mysqli_num_rows($run_hr);
$row_appclose = mysqli_num_rows($run_appclose);
$row_apppending = mysqli_num_rows($run_apppending);
$row_inter = mysqli_num_rows($run_inter);
$row_visa = mysqli_num_rows($run_visa);
?>
<style>
    .size {
        width: 100%;
        height: 250px;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter mt-5">


                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-warning size text-light">
                            <div class="card-body">
                                <h2>No of Applications</h2>
                                <h1><?php echo $row_applicant?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success size text-light">
                            <div class="card-body">
                            <h2>No of Active HRs</h2>
                            <h1><?php echo $row_hr?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-info size text-light">
                            <div class="card-body">
                            <h2>No of Closed cases</h2>
                            <h1><?php echo $row_appclose?></h1>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card bg-dark size text-light">
                            <div class="card-body">
                            <h2>No of Pending cases</h2>
                            <h1><?php echo $row_apppending?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-primary size text-light">
                            <div class="card-body">
                            <h2>No of Interviews conducted</h2>
                            <h1><?php echo $row_inter?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-danger size text-light">
                            <div class="card-body">
                            <h2>No of Visas issued</h2>
                            <h1><?php echo $row_visa?></h1>
                            </div>
                        </div>
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