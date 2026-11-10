<!DOCTYPE HTML>
<html>
<?php
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$qry = "select * from registration where usertype = 'instructor'";
$result_instructor = $obj->GetTable($qry);
$qry = "select * from course where c_status = 'active'";
$result_course = $obj->GetTable($qry);
?>
<body>
<?php

require_once("sidebar.php");
?>

<!-- /.navbar-static-side -->
<div id="page-wrapper">
    <div class="graphs">
        <div class="col_3">
            <!-- Dashboard widgets or other content can go here -->
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
                <h3>BATCH</h3>
                <section class="panel">
                    <header class="panel-heading">
                        Batch Form
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form method="post" action="codes/batch.php">
                                <div class="form-group">
                                    <label for="_Name">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                </div>

                                <div class="form-group">
                                    <label for="max">Max</label>
                                    <input type="number" class="form-control" name="max" placeholder="max" required="">
                                </div>

                                <div class="form-group">
                                    <label for="Course">Instructor</label>
                                    <select name="Insrtuctor" required="" class="form-control">
                                        <option value="">--Select Instructor--</option>
                                        <?php
                                        foreach ($result_instructor as $ins) {
                                        ?>
                                            <option value="<?php echo $ins['registration_id']; ?>"><?php echo $ins['st_name']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Course">Course</label>
                                    <select name="Course" required="" class="form-control">
                                        <option value="">--Select Course--</option>
                                        <?php
                                        foreach ($result_course as $ins) {
                                        ?>
                                            <option value="<?php echo $ins['course_id']; ?>"><?php echo $ins['name']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Course">Status</label>
                                    <select name="status" required="" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option>active</option>
                                        <option>inactive</option>
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
