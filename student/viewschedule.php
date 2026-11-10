<?php
session_start();  // Start the session
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$email = $_SESSION['email'];  // Ensure the session variable is available

// Query to fetch batch_id based on student email
$qry1 = "SELECT batch_id FROM batch_student WHERE student_id = (SELECT registration_id FROM registration WHERE email = '$email')";
$bid = $obj->GetSingleData($qry1);

// If $bid is a valid batch ID, proceed with the schedule query
if ($bid) {
    // Query to fetch the schedule based on batch_id
    $qry = "SELECT * FROM registration r 
            INNER JOIN batch b 
            INNER JOIN schedule s 
            INNER JOIN batch_student bb  
            ON b.batch_id = s.batch_id 
            WHERE s.batch_id = '$bid' 
            AND r.registration_id = bb.student_id 
            AND email = '$email'";
    $result = $obj->GetTable($qry);

    // Debugging: Check the content of $result
    // var_dump($result);

    // Check if $result is an array before using it in foreach
    if (is_array($result)) {
        // Proceed with rendering the table
?>
        <body>
        <?php
        require_once("sidebar.php");
        ?>
        <!-- /.navbar-static-side -->
        <div id="page-wrapper">
            <div class="graphs">
                <div class="col_3">
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="span_11">
                <div class="col-md-6 col_4">
                    <!-- Additional content like maps or charts can be added here -->
                    <!----Calender -------->
                    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
                    <script src="js/underscore-min.js" type="text/javascript"></script>
                    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
                    <script src="js/clndr.js" type="text/javascript"></script>
                    <script src="js/site.js" type="text/javascript"></script>
                    <!----End Calender -------->
                </div>
            </div>

            <div class="content_bottom">
                <div class="col-md-12 span_3">
                    <div class="bs-example1" data-example-id="contextual-table">
                        <h3>Schedule</h3>
                        <section class="wrapper">
                            <div class="table-agile-info">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Schedule
                                    </div>
                                    <div>
                                        <table class="table" ui-jq="footable" ui-options='{
                                            "paging": {
                                                "enabled": true
                                            },
                                            "filtering": {
                                                "enabled": true
                                            },
                                            "sorting": {
                                                "enabled": true
                                            }}'>
                                            <thead>
                                                <tr>
                                                    <th data-breakpoints="xs">ID</th>
                                                    <th>Scheduled Day</th>
                                                    <th>Scheduled From Time</th>
                                                    <th>Scheduled To Time</th>
                                                    <th>Batch Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i = 0;
                                                foreach($result as $row) {
                                                    $i++;
                                                ?>
                                                    <tr data-expanded="true">
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo date('d-m-Y', strtotime($row['sch_date'])); ?></td>
                                                        <td><?php echo $row['sch1_time']; ?></td>
                                                        <td><?php echo $row['sch_time']; ?></td>
                                                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="js/jquery.scrollTo.js"></script>
        <?php
        require_once('footer.php');
        ?>
        </body>
        </html>
<?php
    } else {
        echo "No schedule found for this user.";
    }
} else {
    echo "No batch ID found for this user.";
}
?>
