<!DOCTYPE HTML>
<html>
<?php
require_once('header.php');
require_once("../connectionclass.php");
$obj = new ConnectionClass();
$qry = "SELECT * FROM pdf_resources ";
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
                <h3>PDF Resources</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                PDF RESOURCES
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
                                            <th>title</th>
                                            <th>description</th>
                                            <th>file</th>
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
                                                <td><?php echo $res['title']; ?></td>
                                                <td><?php echo $res['description']; ?></td>
                                                <td><a class="btn btn-primary" href="../admin/pdf/filess/<?php echo $res['file_path']; ?>" target="_blank">View PDF</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
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
<?php
require_once('footer.php');
?>
</body>
</html>
