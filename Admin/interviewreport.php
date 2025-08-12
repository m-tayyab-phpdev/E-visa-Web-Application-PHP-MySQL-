<?php
include 'format.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="row mt-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        Summary Interview Report
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
                $sql = "SELECT * FROM (users a, interview b) WHERE (a.user_id = b.user_id)";
                $run = mysqli_query($con, $sql);
                $num_row = mysqli_num_rows($run);
                if ($num_row > 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <table id="reportTable" border="1" class="table">
                                <thead>
                                    <th>Applicant</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Interview Date</th>
                                    <th>Interview Time</th>
                                    <th>Interview Marks</th>
                                    <th>Interview Status</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM (users a, interview b) WHERE (a.user_id = b.user_id)";
                                    $run_sql = mysqli_query($con, $sql);
                                    $x = 1;
                                    while ($row = mysqli_fetch_assoc($run_sql)) { ?>
                                        <tr>
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['user_email']; ?></td>
                                            <td><?php echo $row['user_phone']; ?></td>
                                            <td><?php $vardate = $row['inter_date'];
                                                echo date("F, d, Y", strtotime($vardate)) ?></td>
                                            <td><?php $vartime = $row['inter_time'];
                                                echo date("g:i a", strtotime($vartime)) ?></td>
                                            <td><?php echo $row['marks']; ?></td>
                                            <td><?php echo $row['result_status']; ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                                <div class="row">
                                    <div class="col-md-11"></div>
                                    <div class="col-md-1">
                                    <button type="button" onclick="downloadReport()" name="btn-report" class="btn btn-warning">Download</button>
                                    </div>
                                </div>
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
                <div class="text-muted">Copyright &copy; Vitrrual University of Pakistan </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>

function downloadReport() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('landscape');

    doc.setFontSize(16);
    doc.text("Summary Interview Report", 14, 15); 
    doc.setFontSize(10);

   
    const headers = [
        ["Applicant", "Email", "Phone", "Interview Date", "Interview Time", "Interview Marks", "Interview Status"]
    ];

    const tableData = [];
    const table = document.getElementById("reportTable");

   
    for (let i = 1; i < table.rows.length; i++) { 
        const row = [];
        for (let cell of table.rows[i].cells) {
            row.push(cell.innerText);
        }
        tableData.push(row);
    }


    doc.autoTable({
        startY: 20, 
        head: headers,
        body: tableData,
        theme: 'striped', 
        headStyles: { fillColor: [150, 150, 150], textColor: [255, 255, 255], fontStyle: 'bold' }, 
        bodyStyles: { fillColor: [240, 240, 240], textColor: [0, 0, 0] }, 
        alternateRowStyles: { fillColor: [230, 230, 230] }, 
        columnStyles: {
            0: { cellWidth: 30 }, 
            1: { cellWidth: 50 }, 
            2: { cellWidth: 30 }, 
            3: { cellWidth: 30 }, 
            4: { cellWidth: 30 }, 
            5: { cellWidth: 30 }, 
            6: { cellWidth: 30 }  
        },
        margin: { left: 3, right: 3 }, 
        tableWidth: 'wrap', 
        styles: { overflow: 'linebreak' }, 
    });


    doc.save("Summary_Interview_Report.pdf");
}
</script>