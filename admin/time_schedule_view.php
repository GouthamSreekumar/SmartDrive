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
                <h3>Time Schedule</h3>
                <?php
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();
                $qry = "select * from schedule inner join batch on batch.batch_id=schedule.batch_id";
                $result = $obj->GetTable($qry);
                ?>
                <!-- Table to display schedule -->
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Time Schedule
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
