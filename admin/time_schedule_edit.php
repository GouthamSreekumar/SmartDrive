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
                <h3>Edit Time Schedule</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $id = $_REQUEST['id'];

                $qry = "select * from schedule where sch_id='$id'";
                $re = $obj->GetSingleRow($qry);
                ?>
                <!-- Form to edit schedule -->
                <div class="form-w3layouts">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    COURSES
                                </header>
                                <div class="panel-body">
                                    <div class="position-center">
                                        <form method="post" action="codes/time_schdeule_exe.php">
                                            <div class="form-group">
                                                <label for="Name">Date</label>
                                                <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($re['sch_date']); ?>" placeholder="Name" required="">
                                            </div>
                                            <input type="hidden" class="form-control" name="id" value="<?php echo htmlspecialchars($re['sch_id']); ?>" placeholder="ID">

                                            <div class="form-group">
                                                <label for="Rate">Start Time</label>
                                                <input type="time" class="form-control" name="start" value="<?php echo htmlspecialchars($re['sch1_time']); ?>" placeholder="start" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="Duration">Duration</label>
                                                <input type="time" class="form-control" name="end" value="<?php echo htmlspecialchars($re['sch_time']); ?>" placeholder="end" required="">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                            <button type="reset" class="btn btn-info btn-sm">Reset</button>
                                        </form>
                                    </div>
                                </div>
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
