<!DOCTYPE HTML>
<html>
<?php
session_start(); // Start the session at the beginning of the script
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$uname = $_SESSION['email'];
$qry = "select * from registration where email='$uname'";
$result = $obj->GetSingleRow($qry);
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
                <h3>Student Profile</h3>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        STUDENT PROFILE
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form action="codes/student_profile_update.php" method="post">
                                                <div class="form-group">
                                                    <label for="_Name">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($result['st_name']); ?>" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="_Name">Address</label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($result['address']); ?>" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="_Name">Contact No</label>
                                                    <input type="text" class="form-control" name="number" value="<?php echo htmlspecialchars($result['contact_no']); ?>" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="_Name">DOB</label>
                                                    <input type="date" class="form-control" name="dob" value="<?php echo htmlspecialchars($result['dob']); ?>" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label hidden for="_Name">ID</label>
                                                    <input type="hidden" class="form-control" name="id" value="<?php echo htmlspecialchars($result['registration_id']); ?>" required="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-info btn-sm" value="Update">
                                                </div>
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
