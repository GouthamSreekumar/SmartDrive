<!DOCTYPE HTML>
<html>
<?php
session_start();  // Start the session
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$uname = $_SESSION['email'];  // Ensure the session variable is available
$qry = "SELECT * FROM demo_exam"; // Update the query to fetch questions and answers
$result = $obj->GetTable($qry);
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
                <h3>Questions and Answers</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Questions and Answers
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
                                            <th>Number</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach($result as $row) { $i++; ?>
                                            <tr data-expanded="true">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo htmlspecialchars($row['question_text']); ?></td>
                                                <td><?php echo htmlspecialchars($row['answer']); ?></td>
                                            </tr>
                                        <?php } ?>
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
