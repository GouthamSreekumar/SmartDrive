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
                <h3>Update Course</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $regid = $_REQUEST['rid'];
                $qry = "SELECT * FROM course WHERE course_id='$regid' AND c_status='active'";
                $re = $obj->GetSingleRow($qry);
                ?>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Edit Course
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form method="post" action="codes/course_exe_edit.php">
                                                <div class="form-group">
                                                    <label for="Name">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $re['name']; ?>" placeholder="Name" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                                </div>
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $re['course_id']; ?>" placeholder="ID">
                                                <div class="form-group">
                                                    <label for="Rate">Rate</label>
                                                    <input type="number" class="form-control" name="rate" value="<?php echo $re['rate']; ?>" placeholder="Rate" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Duration">Duration</label>
                                                    <input type="text" class="form-control" name="duration" value="<?php echo $re['duration']; ?>" placeholder="Duration" required="" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers">
                                                </div>
                                                <div class="form-group">
                                                    <select name="status" required="" class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option value="active"<?php if ($re["c_status"] === "active") echo " selected"; ?>>active</option>
                                                        <option value="inactive"<?php if ($re["c_status"] === "inactive") echo " selected"; ?>>inactive</option>
                                                    </select>
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
