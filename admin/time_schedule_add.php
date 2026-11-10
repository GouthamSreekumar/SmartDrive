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
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                if (isset($_REQUEST['id'])) {
                    $id = $_REQUEST['id'];
                } else {
                    $id = null;
                }
                $qry = "Select * from batch";
                $res = $obj->GetTable($qry);
                ?>
                <!-- Form to add new schedule -->
                <div class="form-w3layouts">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Time Schedule
                                </header>
                                <div class="panel-body">
                                    <div class="position-center">
                                        <form method="post" action="codes/time_schedule.php?id=<?php echo $id ?>">
                                            <?php if ($id == null) { ?>
                                                <div class="form-group">
                                                    <label for="_date">Select Batch</label>
                                                    <select name="id" required="" class="form-control">
                                                        <option value="">--Select Batch--</option><br>
                                                        <?php foreach($res as $row){ ?>
                                                        <option value="<?php echo $row['batch_id'] ?>"><?php echo $row['title'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label for="_date">Title</label>
                                                <input type="date" class="form-control" name="date" placeholder="date" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="time">Start Time</label>
                                                <input type="time" class="form-control" name="start" placeholder="start" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="Course">End Time</label>
                                                <input type="time" class="form-control" name="end" placeholder="end" required="">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                            <button type="reset" class="btn btn-info btn-sm">Reset</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- View existing schedule -->
                                <?php
                                $qry = "select * from schedule where batch_id='$id'";
                                $res = $obj->GetSingleRow($qry);
                                if ($res) {
                                ?>
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
                                                            <th>Date</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr data-expanded="true">
                                                            <td><?php echo htmlspecialchars($res['sch_date']); ?></td>
                                                            <td><?php echo htmlspecialchars($res['sch1_time']); ?></td>
                                                            <td><?php echo htmlspecialchars($res['sch_time']); ?></td>
                                                            <td>
                                                                <a class="btn btn-info btn-sm" href="time_schedule_edit.php?id=<?php echo htmlspecialchars($res['sch_id']); ?>">EDIT</a>
                                                                <a class="btn btn-danger btn-sm" href="codes/time_schedule_delete.php?id=<?php echo htmlspecialchars($res['sch_id']); ?>">DELETE</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </section>
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
