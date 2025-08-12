<?php
include 'format.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="containter">
                <div class="row mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            Interview Info
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <th>Application</th>
                                <th>Interview Date</th>
                                <th>Interview Time</th>
                                <th>Interview Result</th>
                                <th>Obt Marks</th>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_SESSION['ID'];
                                $sql = "SELECT * FROM (interview a, applicant_info b) WHERE (a.user_id = '$id' AND a.app_id = b.app_id)";
                                $run = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($run)) { ?>
                                    <tr>
                                        <td><?php echo $row['visa_category'] ?></td>
                                        <td><?php
                                            if (isset($row['inter_date'])) {
                                                $date = $row['inter_date'];
                                            } else {
                                                $date = null;
                                            }
                                            echo date("F, d, Y", strtotime($date));
                                            ?></td>
                                        <td>
                                            <?php
                                            if (isset($row['inter_time'])) {
                                                $time = $row['inter_time']; 
                                            } else {
                                                $time = null; 
                                            }

                                            
                                            if (!empty($time)) {
                                                echo date("g:i a", strtotime($time));
                                            } else {
                                                echo "N/A"; 
                                            }
                                            ?>
                                        </td>
                                        <td><?php
                                            if (isset($row['result_status'])) {
                                                $status = $row['result_status'];
                                            } else {
                                                $status = null;
                                            }
                                            echo $status;
                                            ?></td>
                                        <td><?php
                                            if (isset($row['marks'])) {
                                                $marks = $row['marks'];
                                            } else {
                                                $marks = null;
                                            }
                                            echo $marks;
                                            ?></td>
                                    </tr>
                                <?php }
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