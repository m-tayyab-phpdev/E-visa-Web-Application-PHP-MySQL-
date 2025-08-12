<?php
include 'format.php';

if (isset($_POST['btn-accept'])) {
    $var_user = $_SESSION['ID'];
    $sql = "INSERT INTO `applicant_info` (`user_id`) VALUES ('$var_user')";
    $run = mysqli_query($con, $sql);
    if ($run) {
        $application = mysqli_insert_id($con);
        $_SESSION['APP_ID'] = $application;
        echo "<script>window.location.replace('visainfo.php');</script>";
    }
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container my-5">
                <h2 class="text-center font-weight-bold mb-4" style="font-family:'Times New Roman', Times, serif;">Terms & Conditions</h2>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-center">Welcome to our Visa Application Portal</h4>
                                <p class="card-text">By accessing and using our services, you agree to the following terms and conditions:</p>

                                <h5 class="mt-4">Application Process</h5>
                                <p>All applicants must complete the visa application form with accurate and current information. Incomplete or inaccurate applications may be delayed or rejected. Applicants must ensure they have read and understood the requirements for the visa they are applying for, as each visa category may have specific criteria. Submitting an application does not guarantee approval, as the decision is made by the relevant immigration authorities.</p>

                                <h5>Supporting Documents</h5>
                                <p>Applicants must submit required supporting documents along with their application. These may include a valid passport, identification documents, proof of financial stability, health and travel insurance, and other relevant materials. We are not responsible for any delays caused by incomplete or improperly submitted documentation.</p>

                                <h5>Fees and Payment</h5>
                                <p>Application processing fees are non-refundable, regardless of the outcome of the visa application. All payments must be made in full at the time of submission to avoid delays in processing.</p>

                                <h5>Data Privacy</h5>
                                <p>We are committed to protecting your personal information. All data provided will be securely stored and only shared with authorized immigration authorities as necessary for the processing of your application. For more details on how we handle your data, please refer to our Privacy Policy.</p>

                                <h5>Processing Times</h5>
                                <p>Visa processing times vary based on the type of visa, applicant’s nationality, and other factors. While we strive to process applications efficiently, we do not guarantee specific timelines.</p>

                                <h5>Disclaimers</h5>
                                <p>We are not responsible for any delays, errors, or rejections resulting from false or incomplete information provided by the applicant. Our portal facilitates the visa application process but does not influence or guarantee the outcome of any application.</p>

                                <h5>Changes to Terms and Conditions</h5>
                                <p>We reserve the right to update these terms and conditions at any time. Any updates will be posted on this page, and it is the responsibility of the applicant to review these terms regularly. By using this portal, applicants acknowledge that they have read, understood, and agreed to these terms and conditions. For any questions or concerns, please contact our support team.</p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col text-center">
                                <strong class="text-primary">Accept Terms and Conditions</strong>
                                <form action="" method="post" class="mt-2">
                                    <button type="submit" name="btn-accept" class="btn btn-success btn-lg">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-4 bg-light mt-auto" style="border-top: 1px solid #eaeaea;">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted" style="font-size: 14px;">Copyright &copy; Virtual University of Pakistan</div>
            </div>
        </div>
    </footer>
</div>
