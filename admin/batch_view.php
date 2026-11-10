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
            <!-- Additional dashboard widgets or other content can be placed here -->
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
                <h3>Batch List</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List of Batches
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
                                            <th>Batch Name</th>
                                            <th>Max Students</th>
                                            <th>Instructor</th>
                                            <th>Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("../connectionclass.php");
                                        $obj = new ConnectionClass();
                                        $qry = "SELECT * FROM batch 
                                                JOIN course ON course.course_id=batch.course_id  
                                                JOIN registration ON registration.registration_id=batch.instructor_id";
                                        $result = $obj->GetTable($qry);
                                        $i = 0;
                                        foreach ($result as $res) {
                                            $i++;
                                        ?>
                                            <tr data-expanded="true">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $res['title']; ?></td>
                                                <td><?php echo $res['max_no_student']; ?></td>
                                                <td><?php echo $res['st_name']; ?></td>
                                                <td><?php echo $res['name']; ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="student_batch_add.php?cid=<?php echo $res['course_id'] ?>&bid=<?php echo $res['batch_id']; ?>">Student</a>
                                                    <a class="btn btn-info btn-sm" href="">View</a>
                                                    <a class="btn btn-info btn-sm" href="batch_edit.php?rid=<?php echo $res['batch_id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" href="codes/batch_delete.php?rid=<?php echo $res['batch_id']; ?>">DELETE</a>
                                                </td>
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
