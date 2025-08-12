<?php
include 'format.php';
if (isset($_POST['btn-feedback'])) {
    extract($_POST);
    $myid = $_SESSION['ID'];
    $sql = "INSERT INTO `feedback`(`sender_id`, `receiver_id`, `feedback`) VALUES ('$myid','$hrid','$feedback')";
    $run_sql = mysqli_query($con, $sql);
    if ($run_sql) {
        echo '<script>alert("Thank you for your feedback");</script>';
    }
}

?>
<style>
    .receipt-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px;
    }

    .receipt-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .ticket {
        border: 1px solid #ccc;
        padding: 15px;
        margin: 10px;
        background-color: #f9f9f9;
        width: calc(25% - 20px);
        /* Adjust for 6 tickets per row */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: left;
        border-radius: 5px;
    }

    .ticket-header {
        background-color: #343a40;
        color: #fff;
        padding: 10px;
        border-radius: 5px 5px 0 0;
        text-align: center;
    }

    .ticket-body {
        padding: 10px;
    }

    .ticket h4 {
        margin: 0;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter">


                <h3 class="text-center text-dark" style="font-family: 'Times New Roman', Times, serif; font-weight: 1000;">Feedback Portal</h3>

                <button type="button" class="btn btn-info form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">Give feedback</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Feedback</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                        <select name="hrid" class="form-control">
                                            <option value="">---Select HR---</option>
                                            <?php
                                            $type = "HR";
                                            $gethr = "SELECT * FROM `users` WHERE `user_type` = '$type'";
                                            $run = mysqli_query($con, $gethr);
                                            $num_row = mysqli_num_rows($run);
                                            if ($num_row > 0) {
                                                while ($row = mysqli_fetch_assoc($run)) {
                                                    echo '<option value="' . $row['user_id'] . '">' . $row['user_name'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No HR found</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Feedback</span>
                                        <textarea class="form-control" rows="3" name="feedback"></textarea>
                                    </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn-feedback">Send feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>




                <div class="receipt-container">
                    <?php
                                        $id = $_SESSION['ID'];
                                        $get = "HR";
                                        $fetch = "SELECT * FROM feedback a, users b WHERE sender_id = '$id' AND a.receiver_id = b.user_id AND b.user_type = '$get'";
                    $run_fetch = mysqli_query($con, $fetch);
                    $x = 1;
                    $tickets_per_row = 4;

                    echo '<div class="receipt-row">';
                    while ($new_row = mysqli_fetch_assoc($run_fetch)) {
                        echo '
        <div class="ticket">
            <div class="ticket-header">
                <h4>Your Feedback</h4>
                <p class="mt-3">Ticket # '.$x.'</p>
            </div>
            <div class="ticket-body">
                <p><strong>HR Name:</strong> ' . $new_row['user_name'] . '</p>
                <p><strong>Your Feedback:</strong> ' . $new_row['feedback'] . '</p>
            </div>
        </div>';

                    
                        if ($x % $tickets_per_row == 0) {
                            echo '</div><div class="receipt-row">';
                        }

                        $x++;
                    }
                    echo '</div>'; // Close the last row
                    ?>
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