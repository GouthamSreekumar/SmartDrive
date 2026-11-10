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
                <h3>Notification</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $qry = "SELECT * FROM registration where usertype = 'instructor'";
                $result_instructor = $obj->GetTable($qry);
                $qry = "SELECT * FROM batch";
                $result_course = $obj->GetTable($qry);
                ?>
                <div class="form-w3layouts">
                    <section class="panel">
                        <header class="panel-heading">Notification</header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form method="post" action="codes/notification.php">
                                    <div class="form-group">
                                        <label for="_Name">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="max">Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Description" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="max">Date</label>
                                        <input type="date" class="form-control" name="date" placeholder="Date" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Course">Instructor</label>
                                        <select name="instructor" required="" class="form-control">
                                            <option value="">--Select Instructor--</option>
                                            <?php
                                            foreach ($result_instructor as $ins) {
                                            ?>
                                                <option value="<?php echo $ins['registration_id']; ?>"><?php echo $ins['st_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Course">Batch</label>
                                        <select name="batch" required="" class="form-control">
                                            <option value="">--Select Batch--</option>
                                            <?php
                                            foreach ($result_course as $course) {
                                            ?>
                                                <option value="<?php echo $course['batch_id']; ?>"><?php echo $course['title']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" required="" class="form-control">
                                            <option value="">--Select Status--</option>
                                            <option value='active'>Active</option>
                                            <option value='inactive'>Inactive</option>
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
