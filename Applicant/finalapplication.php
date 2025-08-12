<?php
include 'format.php';

$id = $_SESSION['ID'];
$application_id = $_SESSION['APP_ID'];
$sql = "SELECT * FROM (users a, applicant_info b) WHERE (b.app_id = '$application_id' AND b.user_id = a.user_id)";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);



if(isset($_GET['del'])){
    $id = $_GET['del'];
    $del = "DELETE FROM `applicant_info` WHERE `app_id` = '$id'";
    $rundel = mysqli_query($con, $del);
    if($rundel){
       echo "<script>alert('Application withdrawn successfully'); window.location.replace('visainfo.php');</script>";
    }
}


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mb-4">

            <div class="container">

                <div style="margin-top: 20px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; position: relative; width: 100%;">
                    <a href="visainfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Visa Info</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #007bff; margin: 0 10px;"></div>
                    <a href="personalinfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Personal Info</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #007bff; margin: 0 10px;"></div>
                    <a href="travelinfo.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Travel & Interview</div></a>
                    <div style="flex-grow: 1; height: 5px; background-color: #007bff; margin: 0 10px;"></div>
                    <a href="finalapplication.php" style="text-decoration: none;"><div style="width: 150px; height: 40px; border-radius: 20px; background-color: #007bff; color: #fff; text-align: center; line-height: 40px; z-index: 2;">Review Application</div></a>
                </div>



                <h2 style="font-family: 'Times New Roman', Times, serif; font-size: 28px; color: #343a40; text-align: center; margin-bottom: 10px;">Review Application</h2>

                <div class="form-section" style="background-color: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #ced4da; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">



                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Applicant Name <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" readonly class="form-control" value="<?php echo $row['user_name'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Email <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" readonly class="form-control" value="<?php echo $row['user_email'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>

                        <div class="col-md-4">
                            <div style="border: 1px solid #ced4da; border-radius: 4px; width: 150px; height: 150px; margin: 10px auto; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center;">
                                <img id="previewImage" src="<?php $folder = "uploads/";
                                                            echo $folder . $row['picture'] ?>" alt="Picture Preview" style="max-width: 100%; max-height: 100%;">
                            </div>

                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Phone # <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['user_phone'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">National CNIC # <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['cnic'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Address <span class="mandatory" style="color: red;">*</span></label>
                            <textarea class="form-control" readonly style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;" rows="3"><?php echo $row['address'] ?></textarea>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa Category <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['visa_category'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa sub-category <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['visa_sub-category'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Application type <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['application_type'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa type <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['visa_type'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Visa applied for <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['applied_for'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Passport No <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['passport_no'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Purpose of visit <span class="mandatory" style="color: red;">*</span></label>
                            <textarea class="form-control" readonly style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;" rows="3"><?php echo $row['visit_purpose'] ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Requested duration <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['number_duration'] . "&nbsp;" . $row['varchar_duration'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Interview at <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['country'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Entry Port <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['entry_port'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Departure <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['departure_port'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Departure date <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['arrival_date'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-weight: 600; margin-bottom: 5px;">Arrival date <span class="mandatory" style="color: red;">*</span></label>
                            <input type="text" class="form-control" readonly value="<?php echo $row['departure_date'] ?>" style="border-radius: 4px; border: 1px solid #ced4da; padding: 10px;">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                        <div class="d-flex" style="gap: 3px; margin-left: 190px;">
                        <div><form action="php/confirmapplication.php" method="post"><input type="hidden" name="appid" value="<?php echo $row['app_id']?>"><button class="btn btn-success" type="submit" name="btn-confirm">Yes i rewiew</button></form></div> <div><a href="finalapplication.php?del=<?php echo $row['app_id']?>" class="btn btn-danger">Withdraw application</a></div>
                        </div>
                        </div>
                    </div>

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