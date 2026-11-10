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
            <!-- Student Request -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-2">
                    <a href="view_registraed_students.php?type=inactive">
                        <i class="pull-left fa fa-users icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Student Request</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Instructor Registration -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-1">
                    <a href="instructorregistration.php">
                        <i class="pull-left fa fa-tasks icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Instructor Registration</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Course Insertion -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-3">
                    <a href="course_add.php">
                        <i class="pull-left fa fa-book icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Course Insertion</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Batch Submission -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-4">
                    <a href="batch_add.php">
                        <i class="pull-left fa fa-book icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Batch Submission</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        <div class="col_3">
            <!-- Time Scheduling -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-5">
                    <a href="time_schedule_add.php">
                        <i class="pull-left fa fa-clock icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Time Scheduling</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Add Questions -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-6">
                    <a href="mock_que.php">
                        <i class="pull-left fa fa-question icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Add Questions</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- PDF File Uploading -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-7">
                    <a href="add_pdf.php">
                        <i class="pull-left fa fa-upload icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>PDF File Uploading</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Add Notification -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-8">
                    <a href="notification_add.php">
                        <i class="pull-left fa fa-bell icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>Add Notification</strong></h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        <div class="col_3">
            <!-- View Feedback -->
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box clr-block-9">
                    <a href="view_feedback.php">
                        <i class="pull-left fa fa-comments icon-rounded"></i>
                        <div class="stats">
                            <h5><strong>View Feedback</strong></h5>
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
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<?php
require_once('footer.php');
?>
</body>
</html>
