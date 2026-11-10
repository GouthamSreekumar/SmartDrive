<?php
// Start the session
session_start();

require_once("header.php");
require_once("sidebar.php");
require_once("../connectionclass.php");

$obj = new ConnectionClass();

// Check if the 'email' is set in the session
if (isset($_SESSION['email'])) {
    $uname = $_SESSION['email'];
    
    // Fetch the registration details based on the email
    $qry1 = "SELECT * FROM registration WHERE email = '$uname'";
    $result1 = $obj->GetSingleRow($qry1);

    // Check if the query returned any result
    if ($result1) {
        $inid = $result1['registration_id'];

        // Fetch the schedule and batch details
        $qry = "SELECT * FROM schedule s INNER JOIN batch b ON b.batch_id = s.batch_id WHERE b.b_status = 'active'";
        $result = $obj->GetTable($qry);
    } else {
        // Handle the case where the registration details are not found
        echo "No registration details found for the provided email.";
        exit;
    }
} else {
    // Handle the case where the email is not set in the session
    echo "User is not logged in.";
    exit;
}
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
            <!----Calendar -------->
            <link rel="stylesheet" href="css/clndr.css" type="text/css" />
            <script src="js/underscore-min.js" type="text/javascript"></script>
            <script src="js/moment-2.2.1.js" type="text/javascript"></script>
            <script src="js/clndr.js" type="text/javascript"></script>
            <script src="js/site.js" type="text/javascript"></script>
            <!----End Calendar -------->
        </div>
    </div>

    <div class="content_bottom">
        <div class="col-md-12 span_3">
            <div class="bs-example1" data-example-id="contextual-table">
                <h3>Time Schedule</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Time Schedule
                            </div>
                            <div>
                                <?php
                                require_once("../connectionclass.php");
                                $obj = new ConnectionClass();
                                $uname = $_SESSION['email'];
                                $qry1 = "SELECT * FROM registration where email='$uname'";
                                $result1 = $obj->GetSingleRow($qry1);
                                $inid = $result1['registration_id'];
                                $qry = "select * from schedule s inner join batch b on b.batch_id=s.batch_id where b.b_status='active'";
                                $result = $obj->GetTable($qry);
                                ?>
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
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Batch</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($result as $res) {
                                            $i++;
                                        ?>
                                            <tr data-expanded="true">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($res['sch_date'])); ?></td>
                                                <td><?php echo $res['sch1_time']; ?></td>
                                                <td><?php echo $res['sch_time']; ?></td>
                                                <td><?php echo $res['title']; ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="time_schedule_edit.php?id=<?php echo $res['sch_id'] ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" href="codes/time_schedule_delete.php?id=<?php echo $res['sch_id'] ?>">DELETE</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
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
<?php
require_once('footer.php');
?>
</body>
</html>
