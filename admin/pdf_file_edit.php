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
                <h3>Edit PDF Resource</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $regid = $_REQUEST['ids'];
                $qry = "SELECT * FROM pdf_resources WHERE resourse_id = '$regid'";
                $re = $obj->GetSingleRow($qry);
                ?>
                <div class="form-w3layouts">
                    <section class="panel">
                        <header class="panel-heading">PDF</header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form method="post" action="codes/pdfedit.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="Contact_Number">File <?php echo htmlspecialchars($re['file_path']); ?></label>
                                        <input type="file" class="form-control" name="file" value="<?php echo htmlspecialchars($re['file_path']); ?>" placeholder="File" required="">
                                    </div>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo htmlspecialchars($re['resourse_id']); ?>" placeholder="ID">
                                    <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                    <button type="reset" class="btn btn-info btn-sm">Reset</button>
                                </form>
                            </div>
                        </div>
                    </section>
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
