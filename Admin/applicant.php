<?php
include 'format.php';
if (isset($_POST['btn-upd'])) {
    $var_id = $_POST['id'];
    $var_name = $_POST['name'];
    $var_email = $_POST['email'];
    $var_pass = $_POST['pass'];
    $var_phone = $_POST['phone'];
  
    $upd = "UPDATE `users` SET `user_name` = '$var_name', `user_email` = '$var_email', `user_phone` = '$var_phone' WHERE `user_id` = '$var_id'";
    $run_upd = mysqli_query($con, $upd);
    if ($run_upd) {
      echo "<script>alert('Record updated'); window.location.replace('applicant.php');</script>";
    }
  }
  
  
  if (isset($_GET['del'])) {
    $var_id = $_GET['del'];
    $delinter = "DELETE FROM `interview` WHERE `user_id` = '$var_id'";
    $delfeedback = "DELETE FROM `feedback` WHERE `sender_id` = '$var_id'";
    $delapp = "DELETE FROM `applicant_info` WHERE `user_id` = '$var_id'";
    $del = "DELETE FROM `users` WHERE `user_id` = '$var_id'";
    $run_del1 = mysqli_query($con, $delinter);
    $run_del2 = mysqli_query($con, $delfeedback);
    $run_del3 = mysqli_query($con, $delapp);
    $run_del4 = mysqli_query($con, $del);
    if ($run_del1 && $run_del2 && $run_del3 && $run_del4) {
      echo "<script>alert('Record deleted');window.location.replace('applicant.php');</script>";
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
                            Applicant details
                        </div>
                    </div>
                </div>




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
                                $sql = "SELECT * FROM `users` WHERE `user_type` = 'Applicant'";
                                $run = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($run)) {
                                    echo '<tr class="text-center">
    <td>' . $row['user_name'] . '</td>
    <td>' . $row['user_email'] . '</td>
    <td>' . $row['user_phone'] . '</td>
    <td><a type="button" href="" class="text-success" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#upd' . $row['user_id'] . '">
  Update
</a></td>
    <td><a href="applicant.php?del=' . $row['user_id'] . '" class="text-danger" style="font-weight:bold;">Delete</a></td>
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