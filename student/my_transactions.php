<!DOCTYPE HTML>
<html>
<?php
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$qry = "select * from registration";
$result_instructor = $obj->GetTable($qry);
$qry = "select * from course";
$result_course = $obj->GetTable($qry);
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
                <h3>Payment</h3>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Payment
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form method="post" action="codes/transaction.php">
                                                <div class="form-group">
                                                    <label for="_Name">Name on card*</label>
                                                    <input type="text" class="form-control" name="Name" placeholder="Title" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="max">Card Number*</label>
                                                    <input type="number" class="form-control" name="Number" placeholder="max" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Course">Exp Date*</label>
                                                    <input type="text" class="form-control" name="Date" placeholder="max" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Course">CVV*</label>
                                                    <input type="number" class="form-control" name="CVV" placeholder="max" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Course">Amount*</label>
                                                    <input type="number" class="form-control" name="Amount" placeholder="max" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Course">Remark*</label>
                                                    <textarea class="form-control" name="Remark" placeholder="max" required=""></textarea>
                                                </div>
                                                <div class="d-grid gap-12 col-6">
                                                    <button class="btn btn-danger" type="submit" style="width: 719px;">Pay Now</button>
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
