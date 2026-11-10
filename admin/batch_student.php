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
                <h3>Select Students for <?php echo $re['title']; ?></h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Students List
                            </div>
                            <div>
                                <form method="post" action="codes/batch_student_exe.php?action=insert&bid=<?php echo $regid; ?>">
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
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>DOB</th>
                                                <th>Gender</th>
                                                <th>Course Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($ree as $res) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><input type="checkbox" name="checkboxs[]" value='<?php echo $res['registration_id']; ?>'></td>
                                                    <td><?php echo $res['st_name']; ?></td>
                                                    <td><?php echo $res['address']; ?></td>
                                                    <td><?php echo $res['email']; ?></td>
                                                    <td><?php echo $res['dob']; ?></td>
                                                    <td><?php echo $res['gender']; ?></td>
                                                    <td><?php echo $res['name']; ?>(<?php echo $res['duration']; ?>)</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="reset" class="btn btn-info">Reset</button>
                                </form>
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
