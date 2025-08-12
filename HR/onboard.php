<?php
include 'format.php';

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-mt-6">
                    <div class="containter">


                        <div class="row mt-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    On-Board Arrival & Departure
                                </div>
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <th>Applicant</th>
                                        <th>Visa</th>
                                        <th>Passport No</th>
                                        <th>Flight From -- To</th>
                                        <th>Visit From -- To</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM (users a, applicant_info b) WHERE (b.application_status = 'closed.png' AND a.user_id = b.user_id)";
                                        $run = mysqli_query($con, $sql);
                                        $x = 1;
                                        while ($row = mysqli_fetch_assoc($run)) {
                                            echo '<tr class="text-center">
<td>' . $row['user_name'] . '</td>
<td>' . $row['applied_for'] . '</td>
<td>' . $row['passport_no'] . '</td>
<td>' . $row['departure_port'] . ' -- ' . $row['entry_port'] . '</td>';
                                            $departure = strtotime($row['departure_date']);
                                            $arrival = strtotime($row['arrival_date']);
                                            echo '<td>' . date("j F Y", $departure) . ' -- ' . date("j F Y", $arrival) . '</td>

</tr>';

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-mt-6"></div>
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