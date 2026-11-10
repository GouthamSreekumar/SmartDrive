<!DOCTYPE HTML>
<html>
<?php
require_once('header.php');
?>
<body>
<?php
require_once('sidebar.php');

// Include the ConnectionClass and fetch batch data
require_once('../connectionclass.php');

$obj = new ConnectionClass();

// Fetch batch data
$sql = "SELECT * FROM batch";
$result = $obj->GetTable($sql);

// Check if $result is an array
if (!is_array($result)) {
    echo "Failed to retrieve batch data.";
    exit;
}
?>
<!--main content start-->
<div id="page-wrapper">
    <div class="graphs">
        <div class="col_3">
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="content_bottom">
        <div class="col-md-12 span_3">
            <div class="bs-example1" data-example-id="contextual-table">
                <h3>Time Schedule</h3>
                <section class="wrapper">
                    <div class="form-w3layouts">
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Time Schedule
                                    </header>
                                    <div class="panel-body">
                                        <div class="position-center">
                                            <form method="post" action="codes/time_schedule.php">
                                                <div class="form-group">
                                                    <label for="_date">Select Batch</label>
                                                    <select name="batch" required="" class="form-control">
                                                        <option value="">--Select Batch--</option>
                                                        <?php 
                                                        if (is_array($result) && !empty($result)) {
                                                            foreach ($result as $row) {
                                                                echo "<option value=\"" . htmlspecialchars($row['batch_id']) . "\">" . htmlspecialchars($row['title']) . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value=\"\">No batches available</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="_date">Date</label>
                                                    <input type="date" class="form-control" name="date" placeholder="date" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="time">Start Time</label>
                                                    <input type="time" class="form-control" name="start" placeholder="start" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Course">End Time</label>
                                                    <input type="time" class="form-control" name="end" placeholder="end" required="">
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
<!-- /#wrapper -->

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>

<?php
require_once('footer.php');
?>
</body>
</html>
