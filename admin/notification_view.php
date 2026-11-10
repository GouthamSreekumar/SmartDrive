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
                <h3>Notifications</h3>
                <?php
                require_once("header.php");
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();
                $qry = "SELECT * FROM notification 
                        INNER JOIN batch ON batch.batch_id = notification.batch_id 
                        INNER JOIN registration ON registration.registration_id = notification.instructor_id";
                $result = $obj->GetTable($qry);
                ?>
                <!-- Table to display notifications -->
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Notifications
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Post Date</th>
                                        <th>Batch</th>
                                        <th>Instructor</th>
                                        <th>Action</th>
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
                                            <td><?php echo $res['n_title']; ?></td>
                                            <td><?php echo $res['description']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($res['post_date'])); ?></td>
                                            <td><?php echo $res['title']; ?></td>
                                            <td><?php echo $res['st_name']; ?></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="notification_edit.php?rid=<?php echo $res['notif_id']; ?>">EDIT</a>
                                                <a class="btn btn-danger btn-sm" href="codes/notification_delete.php?rid=<?php echo $res['notif_id']; ?>">DELETE</a>
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
