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
                <h3>View Payment</h3>
                <?php
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();
                $qry1 = "SELECT *, SUM(amount) as total_amount 
                         FROM client_transaction 
                         JOIN registration 
                         ON registration.email = client_transaction.fk_client_email  
                         GROUP BY fk_client_email";
                $result1 = $obj->GetTable($qry1);
                ?>
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">View Payment</div>
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
                                        <th>Student Name</th>
                                        <th>Date</th>
                                        <th>Amount Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result1 as $row) {
                                        $datetime = new DateTime($row['trans_date']);
                                        $formatted_date = $datetime->format('d-m-y');
                                    ?>
                                    <tr data-expanded="true">
                                        <td><?php echo $row['st_name']; ?></td>
                                        <td><?php echo $formatted_date; ?></td>
                                        <td><?php echo $row['total_amount']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
<?php
require_once('footer.php');
?>
</body>
</html>
