<?php
include 'format.php';
$id = $_SESSION['ID'];
$issue = "Visa Issued";
$reject = "Visa Rejected";
$sql = ["SELECT * FROM `applicant_info` WHERE `user_id` = '$id'", "SELECT * FROM `applicant_info` WHERE `user_id` = '$id' AND `visa_status` = '$issue'", "SELECT * FROM `applicant_info` WHERE `user_id` = '$id' AND `visa_status` = '$reject'"];
$runapp = mysqli_query($con, $sql[0]);
$runissue = mysqli_query($con, $sql[1]);
$runreject = mysqli_query($con, $sql[2]);
$rowapp = mysqli_num_rows($runapp);
$rowissue = mysqli_num_rows($runissue);
$rowreject = mysqli_num_rows($runreject);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter">


                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card bg-dark text-light">
                            <div class="card-body">
                                <h3>No of Applications</h3>
                                <h2><?php echo $rowapp?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-danger text-light">
                            <div class="card-body">
                                <h3>No of Visa Approved</h3>
                                <h2><?php echo $rowissue?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-info text-light">
                            <div class="card-body">
                            <h3>No of Visa Rejected</h3>
                            <h2><?php echo $rowreject?></h2>
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