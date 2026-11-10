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
            <!-- Dashboard widgets or other content can go here -->
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
                <h3>PDF Upload</h3>
                <section class="panel">
                    <header class="panel-heading">
                        PDF Upload Form
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <form method="post" action="codes/pdf.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="Title" placeholder="Title" required="">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" name="Description" placeholder="Description" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">Select file</label>
                                    <input type="file" class="form-control" name="file" placeholder="file" required="">
                                </div>
                                <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                <button type="reset" class="btn btn-info btn-sm">Reset</button>
                            </form>
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
