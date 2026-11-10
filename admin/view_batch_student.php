<!DOCTYPE HTML>
<html>
<?php
require_once('header.php');
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
            <!-- Optional: Map or other visualizations can be included here -->
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
                <h3>View Batch</h3>
                <?php
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();
                $regid = $_REQUEST['id'];
                // Fetch the students in the batch
                $qry = "select * from batch_student inner join batch on batch.batch_id=batch_student.batch_id inner join student on student.registration_id=batch_student.student_id";
                $re = $obj->GetTable($qry);

                // Fetch batch details
                $qry = "select * from batch where batch_id='$regid'";
                $ree = $obj->GetSingleRow($qry);
                ?>
                <!-- Table to display batch students -->
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Batch
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
                                        <th>Student Name</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($re as $res) {
                                        $i++;
                                    ?>
                                        <tr data-expanded="true">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $res['st_name']; ?></td>
                                            <td><?php echo $res['address']; ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="codes/batch_student_exe.php?action=delete&rid=<?php echo $res['batch_student_id']; ?>&id=<?php echo $regid; ?>">DELETE</a>
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
            </div>
            <div class="clearfix"> </div>
        </div>
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
