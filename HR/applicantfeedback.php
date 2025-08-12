<?php
include 'format.php';
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


            <div class="receipt-container">
                    <?php
                    $id = $_SESSION['ID'];
                    $get = "Applicant";
                    $fetch = "SELECT * FROM (feedback a, users b) WHERE (receiver_id = '$id' AND a.sender_id = b.user_id AND b.user_type = '$get')";
                    $run_fetch = mysqli_query($con, $fetch);
                    $x = 1;
                    $tickets_per_row = 4;

                    echo '<div class="receipt-row">';
                    while ($new_row = mysqli_fetch_assoc($run_fetch)) {
                        echo '
        <div class="ticket">
            <div class="ticket-header">
                <h4>Feedback</h4>
                <p class="mt-3">Ticket # '.$x.'</p>
            </div>
            <div class="ticket-body">
                <p><strong>Applicant Name:</strong> ' . $new_row['user_name'] . '</p>
                <p><strong>Feedback:</strong> ' . $new_row['feedback'] . '</p>
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