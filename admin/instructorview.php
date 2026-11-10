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
                <h3>Instructor List</h3>
                <?php
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();

                // Correct query to fetch instructors who are active
                $qry = "SELECT * FROM registration 
                        INNER JOIN login 
                        ON registration.email = login.username 
                        WHERE login.status = 'active' 
                        AND login.usertype = 'instructor'";

                $result = $obj->GetTable($qry);

                // Check if the result is valid
                if (is_string($result)) {
                    echo "Query failed: " . $result; // Display the error
                } elseif (empty($result)) {
                    echo "No records found.";
                } else {
                    // Proceed with the normal flow if $result is an array or object
                ?>
                <!--main content start-->
                <section id="main-content">
                    <section class="wrapper">
                        <div class="table-agile-info">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    INSTRUCTOR LIST
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
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Contact No.</th>
                                                <th>Actions</th>
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
                                                <td><?php echo $res['st_name']; ?></td>
                                                <td><?php echo $res['address']; ?></td>
                                                <td><?php echo $res['email']; ?></td>
                                                <td><?php echo $res['contact_no']; ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm" href="instructor_edit.php?rid=<?php echo $res['registration_id']; ?>">EDIT</a>
                                                    <a class="btn btn-danger btn-sm" href="codes/instructor_delete.php?rid=<?php echo $res['registration_id']; ?>">DELETE</a>
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
                </section>
                <!--main content end-->
                <?php
                }
                ?>
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
