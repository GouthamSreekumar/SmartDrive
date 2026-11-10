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
            <!-- Student Update -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-2">
                    <a href="student_profile.php">
                        <i class="pull-left fa fa-user icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Student Update</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- View Notification -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-1">
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
                <div class="r3_counter_box clr-block-3">
                    <a href="viewschedule.php">
                        <i class="pull-left fa fa-glass icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>View Time Schedule</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- View Questions -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-4">
                    <a href="viewquestions.php">
                        <i class="pull-left fa fa-tasks icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>View Questions</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div> 

        <div class="col_3">
            <!-- Download Files -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-2">
                    <a href="pdfdownloading.php">
                        <i class="pull-left fa fa-download icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Download Files</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Add Feedbacks -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-1">
                    <a href="feedback.php">
                        <i class="pull-left fa fa-comments icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Add Feedbacks</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
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
<script src="js/jquery.scrollTo.js"></script>
<?php
require_once('footer.php');
?>
</body>
</html>
