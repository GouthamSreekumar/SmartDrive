<!DOCTYPE HTML>
<html>
<?php
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$batch_id = $_REQUEST['rid'];
$qry = "SELECT * FROM batch
        INNER JOIN course ON batch.course_id = course.course_id
        INNER JOIN registration ON batch.instructor_id = registration.registration_id
        WHERE batch.batch_id = '$batch_id' AND batch.b_status = 'active'";
$res = $obj->GetSingleRow($qry);
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
                <h3>Edit Batch</h3>
                <section class="panel">
                    <header class="panel-heading">
                        Batch Details
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form method="post" action="codes/batch_exe.php">
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $res['title']; ?>" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                </div>
                                <input type="hidden" class="form-control" name="id" value="<?php echo $res['batch_id']; ?>">

                                <div class="form-group">
                                    <label for="max">Max Number of Students</label>
                                    <input type="number" class="form-control" name="max" value="<?php echo $res['max_no_student']; ?>" required="">
                                </div>

                                <div class="form-group">
                                    <label for="Instructor">Instructor</label>
                                    <?php
                                    $qry = "SELECT * FROM registration";
                                    $result_instructor = $obj->GetTable($qry);
                                    ?>
                                    <select name="Instructor" required="" class="form-control">
                                        <option value="<?php echo $res['registration_id']; ?>"><?php echo $res['st_name']; ?></option>
                                        <?php
                                        foreach ($result_instructor as $res_ins) {
                                        ?>
                                            <option value="<?php echo $res_ins['registration_id']; ?>"><?php echo $res_ins['st_name']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Course">Course</label>
                                    <?php
                                    $qry = "SELECT * FROM course";
                                    $result_course = $obj->GetTable($qry);
                                    ?>
                                    <select name="course" required="" class="form-control">
                                        <option value="<?php echo $res['course_id']; ?>"><?php echo $res['name']; ?></option>
                                        <?php
                                        foreach ($result_course as $res_cou) {
                                        ?>
                                            <option value="<?php echo $res_cou['course_id']; ?>"><?php echo $res_cou['name']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Status">Status</label>
                                    <select name="status" required="" class="form-control">
                                        <option value="">Select</option>
                                        <option value="active" <?php if ($res["b_status"] === "active") echo "selected"; ?>>Active</option>
                                        <option value="inactive" <?php if ($res["b_status"] === "inactive") echo "selected"; ?>>Inactive</option>
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
