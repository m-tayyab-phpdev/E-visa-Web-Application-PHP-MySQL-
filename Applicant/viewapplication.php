<?php
include 'format.php';
if (isset($_GET['delid'])) {
    $var_id = $_GET['delid'];
    $sql = "DELETE FROM `applicant_info` WHERE `app_id` = '$var_id'";
    $run_sql = mysqli_query($con, $sql);
    if ($run_sql) {
        echo "<script>alert('Application has been withdrawn'); window.location.replace('viewapplication.php');</script>";
    }
}


if (isset($_POST['btn-paynow'])) {
    $var_id = $_POST['appid'];
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
                            List of Applications
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



                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <th>Serial #</th>
                                <th>Application</th>
                                <th>Details</th>
                                <th>Challan #</th>
                                <th>Pay online</th>
                                <th>Withdraw</th>
                                <th>Visa Status</th>
                                <th>Your Visa</th>
                            </thead>
                            <tbody>
                                <?php
                                $fk = $_SESSION['ID'];
                                $data = "SELECT * FROM `applicant_info` WHERE `user_id` = '$fk'";
                                $run_data = mysqli_query($con, $data);
                                $x = 1;
                                while ($row = mysqli_fetch_assoc($run_data)) {
                                    echo '   <tr class="text-center">
            <td>' . $x . '</td>
            <td>' . $row['visa_category'] . '</td>';
                                    $status = "Not Schedule";
                                    $status_close = "closed.png";
                                    $current_status = $row['interview'];
                                    if ($current_status != $status || $current_status == $status_close) {
                                        echo '<td><a href="applicationdetail.php?id=' . $row['app_id'] . '" class="text-success" style="font-weight: bold;">Details</a></td>';
                                    } else {
                                        echo '<td><label style="color: green; font-weight: bold;">Pay application fee</label></td>';
                                    }
                                    echo '<td>' . $row['challan'] . '</td>';
                                    $fee_status = $row['application_fee'];
                                    $path = "../stamps/";
                                    if($fee_status === "Not Paid"){
                                        echo '<td><a type="button" class="text-dark" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#pay'.$row['app_id'].'">Payment</a></td>';
                                    }else{
                                        if($current_status == "Scheduled" || $current_status == "Conducted" || $current_status == "Done"){
                                            echo '<td class="text-info">Payment confirmed, Thank you</td>';
                                        }else{
                                            echo '<td class="text-info">Wait while payment being confirmed</td>';
                                        }
                                        
                                    }
                                    
                                    $visa_status = "Visa Issued";
                                    $curent_status = $row['visa_status'];
                                    if ($curent_status != $visa_status) {
                                        echo '<td><a href="viewapplication.php?delid=' . $row['app_id'] . '" class="text-danger" style="font-weight:bold;">Withdraw application</a></td>';
                                    } else {
                                        $case = "closed.png";
                                        $path = "../stamps/";
                                        echo '<td><img src="' . $path . $case . '" style="width: 60px;"></td>';
                                    }



                                    echo '<td>' . $row['visa_status'] . '</td>';

                                    $visadata = $row['visa_status'];
                                    $check = "Visa Issued";
                                    $othercheck = "Visa Rejected";
                                    if ($visadata === $check) {
                                        echo '<td><a href="visa.php?appid=' . $row['app_id'] . '" class="text-warning" style="font-weight:bold;">Download</a></td>';
                                    } else if ($visadata === $othercheck) {
                                        echo '<td><a href="reject.php?appid=' . $row['app_id'] . '" class="text-danger" style="font-weight:bold;">View rejection reason</a></td>';
                                    } else {
                                        echo '<td>Wait, application is in process</td>';
                                    }




                                    echo          '</tr>';
                                    echo '<div class="modal fade" id="pay'.$row['app_id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Application payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Debit Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" maxlength="23">
                    </div>
                    <div class="mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" id="cvv" maxlength="3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="text" class="form-control" value="2000">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Challan #</label>
                        <input type="text" class="form-control" name="challanno" value="'.$row['challan'].'">
                        <input type="hidden" name="appid" value="'.$row['app_id'].'">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark" name="btn-paynow">Pay now</button>
            </div>
            </form>
        </div>
    </div>
</div>';
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




