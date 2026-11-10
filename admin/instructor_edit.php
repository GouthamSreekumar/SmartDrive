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
                <h3>Instructor Registration</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $regid = $_REQUEST['rid'];
                $qry = "SELECT * FROM registration WHERE registration_id='$regid'";
                $re = $obj->GetSingleRow($qry);
                ?>
                <!--main content start-->
                <section id="main-content">
                    <section class="wrapper">
                        <div class="form-w3layouts">
                            <!-- page start-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            INSTRUCTOR REGISTRATION
                                        </header>
                                        <div class="panel-body">
                                            <div class="position-center">
                                                <form method="post" action="codes/instructor_edit_exe.php?action=update">
                                                    <div class="form-group">
                                                        <label for="Instructor_Name">Name</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo $re['st_name']; ?>" placeholder="Name" pattern="[a-zA-Z ]+" title="Character Only" required="">
                                                    </div>
                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $re['registration_id']; ?>" placeholder="ID">
                                                    <div class="form-group">
                                                        <label for="House_Address">Address</label>
                                                        <input type="text" class="form-control" name="address" value="<?php echo $re['address']; ?>" placeholder="Address" pattern="[A-Za-z0-9\s]+" title="Alphanumeric Characters Only" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Contact_Number">Contact No</label>
                                                        <input type="text" class="form-control" name="contact" value="<?php echo $re['contact_no']; ?>" placeholder="Contact No" pattern="[9876][0-9]{9}" title="Enter a valid mobile number" maxlength="10" minlength="10" required="">
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
                    </section>
                </section>
                <!--main content end-->
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
