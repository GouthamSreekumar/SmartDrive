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
                <h3>Change Password</h3>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        CHANGE PASSWORD
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form method="post" action="codes/changepassword_exe.php?action=update">
                                                <div class="form-group">
                                                    <label for="Current_Password">Current Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Current Password" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="New_Password">New Password</label>
                                                    <input type="password" class="form-control" name="newpassword" placeholder="New Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one digit" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Confirm_Password">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="">
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
