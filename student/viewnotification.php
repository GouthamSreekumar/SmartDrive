<!DOCTYPE HTML>
<html>
<?php
session_start();  // Start the session
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$email = $_SESSION['email'];  // Ensure the session variable is available

// Query to fetch notifications
$qry = "SELECT * FROM notification 
        JOIN batch ON notification.batch_id = batch.batch_id 
        JOIN batch_student ON batch_student.batch_id = batch.batch_id 
        JOIN registration ON batch_student.student_id = registration.registration_id 
        WHERE email = '$email' AND n_status = 'active'";

// Fetch data
$result = $obj->GetTable($qry);

// Check if $result is an array
if (!is_array($result)) {
    // Handle error
    echo "<div class='alert alert-danger'>Error: $result</div>";
    $result = []; // Set $result to an empty array to avoid further errors
}
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
                <h3>Notification</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Notification
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
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Post Date</th>
                                            <th>Batch Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($result as $data) {
                                            $i++;
                                        ?>
                                            <tr data-expanded="true">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo htmlspecialchars($data['n_title']); ?></td>
                                                <td><?php echo htmlspecialchars($data['description']); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($data['post_date'])); ?></td>
                                                <td><?php echo htmlspecialchars($data['title']); ?></td>
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
