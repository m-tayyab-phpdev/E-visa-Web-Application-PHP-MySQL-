<?php
include 'format.php';
if (isset($_GET['id'])) {
    $var_id = $_GET['id'];
    $sql = "SELECT * FROM (users a, applicant_info b) WHERE (b.app_id = '$var_id' AND b.user_id = a.user_id)";
    $run_sql = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($run_sql);
}
?>
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background-color: #f5f7fa;
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    .sidebar {
        flex-shrink: 0;
        background-color: #2c3e50;
        padding: 1rem;
        min-width: 250px;
        height: 100vh;
        color: #fff;
    }

    .sidebar a {
        color: #ecf0f1;
        padding: 12px;
        margin-bottom: 8px;
        display: block;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #34495e;
    }

    .content {
        flex-grow: 1;
        padding: 30px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin: 30px auto;
        max-width: 1200px;
    }

    .navbar {
        background-color: #2c3e50;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        color: #ffffff !important;
    }

    .dropdown-menu {
        background-color: #2c3e50;
        border: none;
    }

    .dropdown-menu a {
        color: #ecf0f1 !important;
    }

    .dropdown-menu a:hover {
        background-color: #34495e;
    }

    @media (max-width: 768px) {
        .sidebar {
            min-width: 100px;
        }

        .sidebar a {
            font-size: 14px;
        }
    }

    .header {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px 8px 0 0;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 5px;
    }

    .section-content {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .section-content p {
        margin: 0;
        font-size: 1rem;
    }

    .img-box {
        text-align: center;
        margin: 20px 0;
    }

    .img-box img {
        width: 125px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .signature {
        margin-top: 20px;
        font-style: italic;
        text-align: right;
    }

    .table-borderless td,
    .table-borderless th {
        padding: 0.8rem;
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .modal-footer {
        justify-content: space-between;
    }

    .table-section {
        padding: 20px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .button-section {
        margin-top: 30px;
        text-align: right;
    }

    .modal-header,
    .modal-body {
        padding: 25px;
    }

    footer {
        background-color: #f1f1f1;
        padding: 20px 0;
        text-align: center;
        font-size: 0.9rem;
        color: #777;
        border-top: 1px solid #ddd;
        margin-top: auto;
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter">



            <h3 style="text-align: center; font-weight:bold; font-family:'Times New Roman', Times, serif; margin-top: 10px;">Details</h3>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="section-title">Applicant Details</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th><u>Name</u></th>
                                    <td><?php echo $row['user_name'] ?></td>
                                    <th><u>Applied for</u></th>
                                    <td><?php echo $row['applied_for'] ?></td>
                                </tr>
                                <tr>
                                    <th><u>Email</u></th>
                                    <td><?php echo $row['user_email'] ?></td>
                                    <th><u>Visa category</u></th>
                                    <td><?php echo $row['visa_category'] ?></td>
                                </tr>
                                <tr>
                                    <th><u>Mobile no</u></th>
                                    <td><?php echo $row['user_phone'] ?></td>
                                    <th><u>CNIC #</u></th>
                                    <td><?php echo $row['cnic'] ?></td>
                                </tr>


                            </table>
                        </div>
                        <div class="col-md-3">
                            <div class="img-box">
                                <img src="<?php
                                $path = "../Applicant/uploads/";
                                echo $path . $row['picture'] ?>" alt="Applicant Photo" style="border-radius: 5%; border: 1px solid grey; width: 125px;">
                            </div>
                        </div>
                    </div>

                    <h5 class="section-title">Visa Details</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th><u>Sub-category</u></th>
                            <td><?php echo $row['visa_sub-category'] ?></td>
                            <th><u>Interview</u></th>
                            <td><?php echo $row['country'] ?></td>
                        </tr>
                        <tr>
                            <th><u>Purpose</u></th>
                            <td><?php echo $row['visit_purpose'] ?></td>
                            <th><u>Duration</u></th>
                            <td><?php echo $row['number_duration'] ?>&nbsp;<?php echo $row['varchar_duration'] ?></td>
                        </tr>

                        <tr>
                            <th><u>Departure date</u></th>
                            <td><?php echo $row['departure_date'] ?></td>
                            <th><u>Arival date</u></th>
                            <td><?php echo $row['arrival_date'] ?></td>
                        </tr>

                        <tr>
                            <th><u>Departure Port</u></th>
                            <td><?php echo $row['departure_port'] ?></td>
                            <th><u>Entery port</u></th>
                            <td><?php echo $row['entry_port'] ?></td>
                        </tr>
                    </table>

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