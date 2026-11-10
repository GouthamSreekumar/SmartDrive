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
                <h3>Courses List</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $course_id = $_REQUEST['cid'];
                $batch_id = $_REQUEST['bid'];

                $qry = "SELECT * FROM registration 
                        INNER JOIN course ON course.course_id = registration.course_id 
                        AND NOT EXISTS (SELECT student_id FROM batch_student WHERE batch_student.student_id = registration.registration_id)";
                $result = $obj->GetTable($qry);
                ?>
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            COURSES LIST
                            <?php
                            echo htmlspecialchars($batch_id);
                            ?>
                        </div>
                        <div>
                            <form action="codes/stu_bat_add_code.php?bid=<?php echo htmlspecialchars($batch_id); ?>" method="post">
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
                                            <th>Select</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Gender</th>
                                            <th>Dob</th>
                                            <th>Email</th>
                                            <th>Course Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($result as $res) {
                                            $i++;
                                        ?>
                                        <tr data-expanded="true">
                                            <td><input type="checkbox" name="check[]" value="<?php echo htmlspecialchars($res['registration_id']); ?>"></td>
                                            <td><?php echo htmlspecialchars($i); ?></td>
                                            <td><?php echo htmlspecialchars($res['st_name']); ?></td>
                                            <td><?php echo htmlspecialchars($res['address']); ?></td>
                                            <td><?php echo htmlspecialchars($res['gender']); ?></td>
                                            <td><?php echo htmlspecialchars($res['dob']); ?></td>
                                            <td><?php echo htmlspecialchars($res['email']); ?></td>
                                            <td><?php echo htmlspecialchars($res['name']); ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                <button type="reset" class="btn btn-info btn-sm">Reset</button>
                            </form>
                        </div>
                    </div>
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
