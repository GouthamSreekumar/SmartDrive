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
                <h3>Notification Edit</h3>
                <?php
                require_once('../connectionclass.php');
                $obj = new ConnectionClass();
                $notifid = $_REQUEST['rid'];
                $qry = "SELECT * FROM notification 
                        INNER JOIN batch ON batch.batch_id = notification.batch_id 
                        INNER JOIN registration ON registration.registration_id = notification.instructor_id 
                        WHERE notif_id = '$notifid'";
                $re = $obj->GetSingleRow($qry);
                $qry4 = "SELECT * FROM notification n 
                         INNER JOIN registration r ON n.instructor_id = r.registration_id 
                         WHERE notif_id = '$notifid'";
                $re1 = $obj->GetSingleRow($qry4);
                $instid = $re1['instructor_id'];
                $qry2 = "SELECT * FROM registration r 
                         INNER JOIN login l ON r.email = l.username 
                         WHERE l.status = 'active' AND l.usertype = 'instructor' AND r.registration_id != '$instid'";
                $result = $obj->GetTable($qry2);
                ?>
                <div class="form-w3layouts">
                    <section class="panel">
                        <header class="panel-heading">Notification Edit</header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form method="post" action="codes/notification_exe.php">
                                    <div class="form-group">
                                        <label for="Instructor_Name">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($re['n_title']); ?>" placeholder="Title" required="">
                                    </div>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo htmlspecialchars($re['notif_id']); ?>">

                                    <div class="form-group">
                                        <label for="House_Address">Description</label>
                                        <input type="text" class="form-control" name="desc" value="<?php echo htmlspecialchars($re['description']); ?>" placeholder="Description" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="Contact_Number">Post Date</label>
                                        <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($re['post_date']); ?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="batch">Batch</label>
                                        <select name="batch" required="" class="form-control">
                                            <option value="<?php echo htmlspecialchars($re['batch_id']); ?>"><?php echo htmlspecialchars($re['title']); ?></option>
                                            <?php
                                            $qry = "SELECT * FROM batch";
                                            $result_course = $obj->GetTable($qry);
                                            foreach ($result_course as $res_cou) {
                                            ?>
                                                <option value="<?php echo htmlspecialchars($res_cou['batch_id']); ?>"><?php echo htmlspecialchars($res_cou['title']); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Instructor">Instructor</label>
                                        <select name="ins" required="" class="form-control">
                                            <option value="<?php echo htmlspecialchars($re1['instructor_id']); ?>"><?php echo htmlspecialchars($re['st_name']); ?></option>
                                            <?php
                                            foreach ($result as $res_cou) {
                                            ?>
                                                <option value="<?php echo htmlspecialchars($res_cou['registration_id']); ?>"><?php echo htmlspecialchars($res_cou['st_name']); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Duration">Status</label>
                                        <select name="sts" required="" class="form-control">
                                            <option value="<?php echo htmlspecialchars($re['n_status']); ?>"><?php echo htmlspecialchars($re['n_status']); ?></option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
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
            <div class="clearfix"> </div>
        </div>
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
