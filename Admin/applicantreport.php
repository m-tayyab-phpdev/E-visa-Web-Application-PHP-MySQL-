<?php
include 'format.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row mt-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        Summary Report
                    </div>
                </div>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" name="btn-click" class="btn btn-danger form-control">Generate Now</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['btn-click'])) {
                $sql = "SELECT * FROM (applicant_info a, users b, interview c) WHERE (a.user_id = b.user_id AND a.app_id = c.app_id)";
                $run = mysqli_query($con, $sql);
                $num_row = mysqli_num_rows($run);
                if ($num_row > 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="reportTable" border="1" class="table">
                                    <thead>
                                        <tr>
                                            <th>Applicant</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>CNIC</th>
                                            <th>Visa</th>
                                            <th>Applied For</th>
                                            <th>Passport No</th>
                                            <th>Interview Country</th>
                                            <th>Visa Status</th>
                                            <th>Interview Marks</th>
                                            <th>Interview Result</th>
                                            <th>Visa Duration</th>
                                            <th>Visa From</th>
                                            <th>Visa Expires</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($run)) { ?>
                                            <tr>
                                                <td><?php echo $row['user_name']; ?></td>
                                                <td><?php echo $row['user_email']; ?></td>
                                                <td><?php echo $row['user_phone']; ?></td>
                                                <td><?php echo $row['cnic']; ?></td>
                                                <td><?php echo $row['visa_category']; ?></td>
                                                <td><?php echo $row['applied_for']; ?></td>
                                                <td><?php echo $row['passport_no']; ?></td>
                                                <td><?php echo $row['country']; ?></td>
                                                <td><?php echo $row['visa_status']; ?></td>
                                                <td><?php echo $row['marks']; ?></td>
                                                <td><?php echo $row['result_status']; ?></td>
                                                <td><?php echo $row['approve_num_duration'] . ' ' . $row['approve_var_duration']; ?></td>
                                                <td><?php echo $row['approve_from_date']; ?></td>
                                                <td><?php echo $row['approve_expire_date']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <button onclick="downloadReport()" class="btn btn-warning form-control mt-3">Download Report</button>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Virtual University of Pakistan</div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>

<script>
    function downloadReport() {
        const {
            jsPDF
        } = window.jspdf;

        const doc = new jsPDF('landscape');

        doc.setFontSize(16);
        doc.text("Summary Report", 14, 15);
        doc.setFontSize(10);


        const headers = [
            ["Applicant", "Email", "CNIC", "Visa", "Applied For", "Passport No",
                "Visa Status", "Interview Result", "Visa Duration"
            ]
        ];

        const tableData = [];
        const table = document.getElementById("reportTable");


        for (let i = 1; i < table.rows.length; i++) {
            const row = [];

            row.push(table.rows[i].cells[0].innerText);
            row.push(table.rows[i].cells[1].innerText);
            row.push(table.rows[i].cells[3].innerText);
            row.push(table.rows[i].cells[4].innerText);
            row.push(table.rows[i].cells[5].innerText);
            row.push(table.rows[i].cells[6].innerText);
            row.push(table.rows[i].cells[8].innerText);
            row.push(table.rows[i].cells[10].innerText);
            row.push(table.rows[i].cells[11].innerText);
            tableData.push(row);
        }


        doc.autoTable({
            startY: 20,
            head: headers,
            body: tableData,
            theme: 'striped',
            headStyles: {
                fillColor: [150, 150, 150],
                textColor: [255, 255, 255],
                halign: 'center',
                fontStyle: 'bold'
            }, // Darker gray for header background with white text
            bodyStyles: {
                fillColor: [240, 240, 240],
                textColor: [0, 0, 0],
                cellPadding: 3,
                fontSize: 7
            }, // Light gray background with black text for body cells
            alternateRowStyles: {
                fillColor: [230, 230, 230]
            },
            columnStyles: {
                0: {
                    cellWidth: 30
                },
                1: {
                    cellWidth: 50
                },
                2: {
                    cellWidth: 35
                },
                3: {
                    cellWidth: 15
                },
                4: {
                    cellWidth: 30
                },
                5: {
                    cellWidth: 30
                },
                6: {
                    cellWidth: 30
                },
                7: {
                    cellWidth: 30
                },
                8: {
                    cellWidth: 30
                },
            },
            margin: {
                left: 10,
                right: 10
            },
            tableWidth: 'wrap',
            styles: {
                overflow: 'linebreak'
            },
        });

        doc.save("Summary_Report.pdf");
    }
</script>