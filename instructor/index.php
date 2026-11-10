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
        <!-- Market Updates Section -->
        <div class="col_3">
            <!-- View Notification -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-2">
                    <a href="viewnotification.php">
                        <i class="pull-left fa fa-bell-o icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>View Notification</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- View Time Schedule -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-1">
                    <a href="time_schedule_view.php">
                        <i class="pull-left fa fa-glass icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>View Time Schedule</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- /#page-wrapper -->
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
