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
                <h3>Instructor Registration</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                ?>
                <!--main content start-->
                <section id="main-content">
                    <section class="wrapper">
                        <div class="form-w3layouts">
                            <!-- page start-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            INSTRUCTOR REGISTRATION
                                        </header>
                                        <div class="panel-body">
                                            <div class="position-center">
                                                <form method="post" action="codes/instructor.php">
                                                    <div class="form-group">
                                                        <label for="Instructor_Name">Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name" pattern="[a-zA-Z ]+" title="Characters only" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="House_Address">Address</label>
                                                        <textarea class="form-control" name="address" placeholder="Address" pattern="[a-zA-Z ]+" title="Character Only" required=""></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="E_mail_id">Email address</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a Valid Email ID" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Contact_Number">Contact No</label>
                                                        <input 
                                                            type="tel" 
                                                            class="form-control" 
                                                            name="contact" 
                                                            placeholder="Contact No" 
                                                            pattern="[6-9]{1}[0-9]{9}" 
                                                            title="Enter a valid 10-digit mobile number starting with 6, 7, 8, or 9" 
                                                            maxlength="10" 
                                                            minlength="10" 
                                                            inputMode="numeric"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one digit" required="">
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
                </section>
                <!--main content end-->
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
