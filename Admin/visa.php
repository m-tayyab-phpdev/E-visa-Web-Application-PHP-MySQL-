<?php
include 'format.php';
if (isset($_POST['btn-issue'])) {
    extract($_POST);
    $change_status = "Visa Issued";
    $case = "closed.png";
    $issue_visa = "UPDATE `applicant_info` SET `visa_status` = '$change_status', `approve_num_duration` = '$num', `approve_var_duration` = '$count', `approve_issue_date` = '$issue', `approve_from_date` = '$from', `approve_expire_date` = '$expire', `application_status` = '$case' WHERE `app_id` = '$id'";
    $run_issue_visa = mysqli_query($con, $issue_visa);
    if ($run_issue_visa) {
        echo "<script>alert('Visa status updated'); window.location.replace('visa.php');</script>";
    }
}


if (isset($_GET['reject'])) {
    $var_reject = $_GET['reject'];
    $change_status = "Visa Rejected";
    $case = "closed.png";
    $issue_visa = "UPDATE `applicant_info` SET `visa_status` = '$change_status', `application_status` = '$case' WHERE `app_id` = '$var_reject'";
    $run_issue_visa = mysqli_query($con, $issue_visa);
    if ($run_issue_visa) {
        echo "<script>alert('Visa status updated'); window.location.replace('visa.php');</script>";
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
                            Issue Visa's Panel
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <th>Applicant</th>
                                <th>CNIC</th>
                                <th>Visa</th>
                                <th>Interview Result</th>
                                <th>Interview Marks</th>
                                <th>Issue Visa</th>
                                <th>Reject Visa</th>
                                <th>Visa Status</th>
                            </thead>
                            <tbody>
                                <?php
                                $status = "Done";
                                $sql = "SELECT * FROM (users a, applicant_info b, interview c) WHERE (b.interview = '$status' AND b.user_id = a.user_id AND a.user_id = c.user_id AND b.app_id = c.app_id)";
                                $run_sql = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_assoc($run_sql)) {
                                    echo '<tr class="text-center">
    <td>' . $row['user_name'] . '</td>
    <td>' . $row['cnic'] . '</td>
    <td>' . $row['visa_category'] . '</td>
    <td>' . $row['result_status'] . '</td>
    <td>' . $row['marks'] . '</td>';
                                    $path = "../stamps/";
                                    $application = $row['application_status'];
                                    if ($application != "closed.png") {
                                        echo '<td><a href="#" type="button" class="text-success" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#idd' . $row['app_id'] . '">Issue now</a></td>';
                                    } else {
                                        echo '<td><a href="#" type="button" class="text-warning" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#idd' . $row['app_id'] . '">Update Visa</a></td>';
                                    }
                                    if ($application != "closed.png") {
                                        echo '<td><a href="issuevisa.php?reject=' . $row['app_id'] . '" class="text-danger" style="font-weight: bold;">Reject Visa</a></td>';
                                    } else {
                                        echo '<td><a href="visa.php?reject=' . $row['app_id'] . '" class="text-warning" style="font-weight: bold;">Update Visa</a></td>';
                                    }
                                    echo '<td>' . $row['visa_status'] . '</td>';


                                    echo '<div class="modal fade" id="idd' . $row['app_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                                        <div class="modal-header" style="background-color: #212529; color: white;"><b>Issue visa to ' . $row['user_name'] . '</b>
                                          <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
                                          <form action="" method="post">
                                            <div class="card" style="border: none;">
                                              <div class="card-body" style="padding: 15px;">
                                                <label style="display: block; margin-bottom: 10px;">
                                                  <b>Duration</b> &nbsp;&nbsp;&nbsp;
                                                  <input type="number" name="num" style="width: 200px; height: 35px; border-radius: 4px; border: 1px solid #ced4da; padding: 5px;">
                                                  <select name="count" style="border-radius: 4px; border: 1px solid #ced4da; padding: 5px; width: 130px;">
                                                    <option value="days">Days</option>
                                                    <option value="weeks">Weeks</option>
                                                    <option value="months">Months</option>
                                                    <option value="years">Years</option>
                                                  </select>
                                                </label>
                                  
                                                <label class="mt-3" style="display: block;">
                                                  <b>Issue Date</b>&nbsp;
                                                  <input type="date" name="issue" style="width: 335px; height: 35px; border-radius: 4px; border: 1px solid #ced4da;">
                                                </label>
                                  
                                                <label class="mt-3" style="display: block;">
                                                  <b>Visa from</b>&nbsp;&nbsp;&nbsp;
                                                  <input type="date" name="from" style="width: 335px; height: 35px; border-radius: 4px; border: 1px solid #ced4da;">
                                                </label>
                                  
                                                <label class="mt-3" style="display: block;">
                                                  <b>Visa expire</b>&nbsp;
                                                  <input type="date" name="expire" style="width: 335px; height: 35px; border-radius: 4px; border: 1px solid #ced4da;">
                                                </label>
                                              </div>
                                            </div>
                                            <input type="hidden" value="' . $row['app_id'] . '" name="id">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" name="btn-issue" class="btn btn-primary">Issue now</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
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
                <div class="text-muted">Copyright &copy; Virtual University of Pakistan</div>
            </div>
        </div>
    </footer>
</div>