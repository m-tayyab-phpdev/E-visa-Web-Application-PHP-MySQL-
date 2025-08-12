<?php
include 'format.php';
if (isset($_GET['appid'])) {
    $var_id = $_GET['appid'];
    $paid = "paid.png";
    $status = "process.png";
    $upd = "UPDATE `applicant_info` SET `application_fee` = '$paid', `application_status` = '$status' WHERE `app_id` = '$var_id'";
    $run_upd = mysqli_query($con, $upd);
    if ($run_upd) {
        echo "<script>alert('Fee status updated'); window.location.replace('viewapplication.php');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter">


                <div class="row mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            Applications
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <th>Serial #</th>
                                <th>Applicant</th>
                                <th>CNIC</th>
                                <th>Mobile</th>
                                <th>Visa</th>
                                <th>Challan no</th>
                                <th>Application Fee</th>
                                <th>Application Status</th>
                                <th>View Application</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM (users a, applicant_info b) WHERE (a.user_id = b.user_id)";
                                $run = mysqli_query($con, $sql);
                                $x = 1;
                                while ($row = mysqli_fetch_assoc($run)) {
                                    echo '<tr class="text-center">
<td>' . $x . '</td>
<td>' . $row['user_name'] . '</td>
<td>' . $row['cnic'] . '</td>
<td>' . $row['user_phone'] . '</td>
<td>' . $row['visa_category'] . '</td>
<td>' . $row['challan'] . '</td>';
                                    $fee_status = $row['application_fee'];
                                    $path = "../stamps/";
                                    if ($fee_status == "Not Paid") {
                                        echo '<td><a href="viewapplication.php?appid=' . $row['app_id'] . '" class="text-info" style="font-weight: bold;">Paid</a></td>';
                                    } else {
                                        echo '<td><img src="' . $path.$row['application_fee'] . '" style="height: 40px;"></td>';
                                    }

                                    if ($fee_status == "Not Paid") {
                                        echo '<td>' . $row['application_status'] . '</td>';
                                    } else {
                                        echo '<td><img src="'. $path.$row['application_status'] . '" style="height: 40px;"></td>';
                                    }
                                    echo '<td><a href="viewapplicationdetail.php?id=' . $row['app_id'] . '" class="text-success" style="font-weight: bold;">See details</a></td>
</tr>';
                                    $x++;
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