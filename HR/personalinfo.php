<?php
include 'format.php';

$id = $_SESSION['ID'];
$sql = "SELECT * FROM (users a, applicant_info b) WHERE (a.user_id = '$id' AND a.user_id = b.user_id)";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);

if (isset($_POST['btn-step2'])) {
    $cnic = mysqli_real_escape_string($con, $_POST['cnic']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $path = $_FILES['picture']['name'];
    $fakepath = $_FILES['picture']['tmp_name'];
    $size = $_FILES['picture']['size'];
    $type = $_FILES['picture']['type'];
    move_uploaded_file($fakepath, "uploads/" . $path);
    $application_id = $_SESSION['APP_ID'];
    $upload = "UPDATE `applicant_info` SET `picture` = '$path',`cnic` = '$cnic', `address` = '$address' WHERE `app_id` = '$application_id'";
    $run_upload = mysqli_query($con, $upload);
    if ($run_upload) {
        echo "<script>window.location.replace('travelinfo.php');</script>";
    }
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mb-4">

            <div class="container">

                <div style="margin-top: 20px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; position: relative; width: 100%;">
                    <div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Visa Info</div>
                    <div style="flex-grow: 1; height: 5px; background-color: #007bff; margin: 0 10px;"></div>
                    <div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Personal Info</div>
                    <div style="flex-grow: 1; height: 5px; background-color: #d3d3d3; margin: 0 10px;"></div>
                    <div style="width: 150px; height: 40px; border-radius: 20px; background-color: #d3d3d3; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Travel & Interview Info</div>
                    <div style="flex-grow: 1; height: 5px; background-color: #d3d3d3; margin: 0 10px;"></div>
                    <div style="width: 150px; height: 40px; border-radius: 20px; background-color: #d3d3d3; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Review Application</div>
                </div>




                <h2 style="font-family: 'Times New Roman', Times, serif; font-size: 28px; color: #343a40; text-align: center; margin-bottom: 10px;">Personal Information</h2>

                <div class="form-section" style="background-color: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">


                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Applicant Name <span class="mandatory" style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $row['user_name'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;"><br>
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Email <span class="mandatory" style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="<?php echo $row['user_email'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>

                            <div class="col-md-4">
                                <div style="border: 1px solid #ced4da; border-radius: 4px; width: 150px; height: 150px; margin: 10px auto; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center;">
                                    <img id="previewImage" src="<?php $folder = "uploads/";
                                                                echo $folder . $row['picture'] ?>" alt="Picture Preview" style="max-width: 100%; max-height: 100%;">
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="document.getElementById('applicantPicture').click();" style="font-weight: bold; margin-left: 90px;">
                                    Browse picture
                                </button>
                                <input type="file" required="" id="applicantPicture" name="picture" style="display: none;" onchange="previewImage(event)">

                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Phone # <span class="mandatory" style="color: red;">*</span></label>
                                <input type="text" class="form-control" required="" value="<?php echo $row['user_phone'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">National CNIC # <span class="mandatory" style="color: red;">*</span></label>
                                <input type="text" class="form-control" required="" name="cnic" value="<?php if (isset($row['cnic'])) {
                                                                                                            $nic = $row['cnic'];
                                                                                                        } else {
                                                                                                            $nic = null;
                                                                                                        };
                                                                                                        echo $nic; ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Address <span class="mandatory" style="color: red;">*</span></label>
                                <textarea class="form-control" name="address" required="" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;" rows="3"><?php if (isset($row['address'])) {
                                                                                                                                                                                $address = $row['address'];
                                                                                                                                                                            } else {
                                                                                                                                                                                $address = null;
                                                                                                                                                                            };
                                                                                                                                                                            echo $address; ?></textarea>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary form-control" name="btn-step2" style="background-color: #0d6efd; border-color: #0d6efd; padding: 12px; font-weight: bold; border-radius: 4px; transition: background-color 0.3s ease;">
                            Submit and Move to next step
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto" style="background-color: #f8f9fa; padding-top: 16px; padding-bottom: 16px; border-top: 1px solid #eaeaea;">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted" style="font-size: 14px;">Copyright &copy; Virtual University of Pakistan</div>
            </div>
        </div>
    </footer>
</div>