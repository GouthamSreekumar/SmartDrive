<!DOCTYPE HTML>
<html>
<?php
session_start();
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$uname = $_SESSION['email'];

// Retrieve test results from session
$score = isset($_SESSION['test_score']) ? $_SESSION['test_score'] : 0;
$total_questions = isset($_SESSION['total_questions']) ? $_SESSION['total_questions'] : 0;
$percentage = isset($_SESSION['test_percentage']) ? $_SESSION['test_percentage'] : 0;

// Clear session variables
unset($_SESSION['test_score']);
unset($_SESSION['total_questions']);
unset($_SESSION['test_percentage']);
?>
<body>
<?php require_once("sidebar.php"); ?>
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
                <h3>Test Results</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Your Score
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
                                            <th>Total Questions</th>
                                            <th>Correct Answers</th>
                                            <th>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-expanded="true">
                                            <td><?php echo $total_questions; ?></td>
                                            <td><?php echo $score; ?></td>
                                            <td><?php echo number_format($percentage, 2); ?>%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="text-center">
                    <a href="mock_test.php" class="btn btn-primary">Take Another Test</a>
                </div>
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
<?php require_once('footer.php'); ?>
</body>
</html>