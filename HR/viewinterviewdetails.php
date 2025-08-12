<?php
include 'format.php';
if (isset($_GET['id'])) {
    $var_id = $_GET['id'];
    $status = "Conducted";
    $sql = "UPDATE `applicant_info` SET `interview` = '$status' WHERE `app_id` = '$var_id'";
    $run_sql = mysqli_query($con, $sql);
    if ($run_sql) {
        echo "<script>alert('Interview status updated'); window.location.replace('viewinterviewdetails.php');</script>";
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
                            Interview Summary
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <th>Serial #</th>
                                <th>Applicant</th>
                                <th>Details</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php
                                $fetch = "SELECT * FROM (interview a, users b, applicant_info c) WHERE (a.user_id = b.user_id AND a.app_id = c.app_id)";
                                $run = mysqli_query($con, $fetch);
                                $x = 1;
                                $path = "../Applicant/uploads/";
                                while ($row = mysqli_fetch_assoc($run)) {
                                    echo '<tr class="text-center">
    <td>' . $x . '</td>
    <td>' . $row['user_name'] . '</td>
    <td> <a href="#" style="color: green; text-decoration: underline; cursor: pointer; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#detail' . $row['inter_id'] . '">
    View details
  </a></td>';
                                    $status_new = $row['interview'];
                                    if ($status_new != "Conducted" && $status_new != "Done") {
                                        echo '<td><a href="viewinterviewdetails.php?id=' . $row['app_id'] . '" class="text-danger" style="font-weight:bold;">Conducted</a></td>';
                                    } else {
                                        echo '<td style="color:green; font-weight:bold;">Interview Conducted</td>';
                                    }

                                    echo '</tr>

<div class="modal fade" id="detail' . $row['inter_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content" style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
      <div class="modal-header" style="background-color: #343a40; color: #fff;>
        <h1 class="modal-title fs-5" id="exampleModalLabel">Interview Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="padding: 20px; background-color: #f8f9fa;">
        <div class="card" style="border: none; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">
          <div class="card-header" style="color: black; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 10px 15px;">
            <b>Applicant Name:</b> ' . $row['user_name'] . '
          </div>
          <div class="card-body" style="padding: 20px;">
            <div class="row">
              <div class="col-md-8">
                <label style="display: block; margin-bottom: 8px;">
                  <span style="font-weight: bold; color: #333;">Date:</span>
                  <span style="margin-left: 5px; color: #555;">' . $row['inter_date'] . '</span>
                </label>
                <label style="display: block; margin-bottom: 8px;">
                  <span style="font-weight: bold; color: #333;">Time:</span>
                  <span style="margin-left: 5px; color: #555;">' . $row['inter_time'] . '</span>
                </label>
                <label style="display: block; margin-bottom: 8px;">
                  <span style="font-weight: bold; color: #333;">Comment:</span>
                  <span style="margin-left: 5px; color: #555;">' . $row['inter_cmt'] . '</span>
                </label>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <img src="' . $path . $row['picture'] . '" style="width: 100%; border-radius: 5px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: #f1f1f1; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



';
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