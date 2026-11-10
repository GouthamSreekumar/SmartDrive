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
                <h3>Courses</h3>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        COURSES
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form method="post" action="codes/course.php">
                                                <div class="form-group">
                                                    <label for="_Name">Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Name" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="Rate">Rate</label>
                                                    <input type="number" class="form-control" name="rate" placeholder="Rate" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Duration">Duration</label>
                                                    <input type="text" class="form-control" name="duration" placeholder="Duration" required="" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers">
                                                </div>
                                                <div class="form-group">
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
