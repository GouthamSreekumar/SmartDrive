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
            <!-- Add any dashboard content here if needed -->
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="span_11">
        <div class="col-md-6 col_4">
            <!-- Optional: Add content like maps or charts here -->
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
                <h3>STUDENT LIST</h3>

                <?php
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();
                $status = $_REQUEST['type'];

                $qry = "SELECT * FROM registration r 
                        INNER JOIN login l ON r.email = l.username 
                        INNER JOIN course c ON c.course_id = r.course_id 
                        WHERE l.status = '$status' AND l.usertype = 'student' AND c.c_status = 'active'";
                $result = $obj->GetTable($qry);

                // Debugging: Check the result of the query
                if (is_string($result)) {
                    echo "Query Error: " . $result;
                    exit;
                }
                ?>

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
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Course Name</th>
                                <th>Profile Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            if (is_array($result)) {
                                foreach ($result as $res) {
                                    $i++;
                                    ?>
                                    <tr data-expanded="true">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $res['st_name']; ?></td>
                                        <td><?php echo $res['address']; ?></td>
                                        <td><?php echo $res['email']; ?></td>
                                        <td>
                                            <?php
                                            $dob = $res['dob'];
                                            $formattedDob = date("d-m-Y", strtotime($dob));
                                            echo $formattedDob;
                                            ?>
                                        </td>
                                        <td><?php echo $res['gender']; ?></td>
                                        <td><?php echo $res['name']; ?>(<?php echo $res['duration']; ?>)</td>
                                        <td><img src="documents/zip/<?php echo $res["file_path"]; ?>" width="100"
                                                 alt="<?php echo $res["file_path"]; ?>"/></td>
                                        <td>
                                            <?php
                                            if ($status == "active") {
                                                ?>
                                                <a class="btn btn-warning btn-sm"
                                                   href="codes/rejected_exe.php?action=reject&name=<?php echo $res['username']; ?>">REJECT</a>
                                                <a class="btn btn-danger btn-sm"
                                                   href="codes/delete_exe.php?action=delete&name=<?php echo $res['username']; ?>">DELETE</a>
                                                <?php
                                            } elseif ($status == "inactive") {
                                                ?>
                                                <a class="btn btn-success btn-sm"
                                                   href="codes/approve_exe.php?name=<?php echo $res['username']; ?>">APPROVE</a>
                                                <a class="btn btn-warning btn-sm"
                                                   href="codes/rejected_exe.php?action=reject&name=<?php echo $res['username']; ?>">REJECT</a>
                                                <a class="btn btn-danger btn-sm"
                                                   href="codes/delete_exe.php?action=delete&name=<?php echo $res['username']; ?>">DELETE</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a class="btn btn-success btn-sm"
                                                   href="codes/rejec_approve_exe.php?name=<?php echo $res['username']; ?>">APPROVE</a>
                                                <a class="btn btn-danger btn-sm"
                                                   href="codes/delete_exe.php?action=delete&name=<?php echo $res['username']; ?>">DELETE</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='9'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
