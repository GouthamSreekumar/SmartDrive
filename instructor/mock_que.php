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
                <h3>Questions</h3>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        QUESTIONS
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form method="post" action="codes/mock.php">
                                                <div class="form-group">
                                                    <label for="_Question">Question Text</label>
                                                    <input type="text" name="question" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Option_1">Option 1</label>
                                                    <input type="text" name="option1" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Option_2">Option 2</label>
                                                    <input type="text" name="option2" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Option_3">Option 3</label>
                                                    <input type="text" name="option3" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Answer">Answer</label>
                                                    <input type="text" class="form-control" name="answer" required="">
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
