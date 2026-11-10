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
                <h3>QUESTIONS AND ANSWERS</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                QUESTIONS AND ANSWERS
                            </div>
                            <div>
                                <table class="table" width="450" ui-jq="footable" ui-options='{
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
                                            <th>Question</th>
                                            <th>Option 1</th>
                                            <th>Option 2</th>
                                            <th>Option 3</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("../connectionclass.php");
                                        $obj = new ConnectionClass();
                                        $qry = "SELECT * FROM demo_exam";
                                        $result = $obj->GetTable($qry);

                                        // Check if $result is an array
                                        if (!is_array($result)) {
                                            echo "Failed to retrieve data.";
                                            exit;
                                        }

                                        $i = 0;
                                        foreach ($result as $res) {
                                            $i++;
                                        ?>
                                        <tr data-expanded="true">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo htmlspecialchars($res['question_text']); ?></td>
                                            <td><?php echo htmlspecialchars($res['option1']); ?></td>
                                            <td><?php echo htmlspecialchars($res['option2']); ?></td>
                                            <td><?php echo htmlspecialchars($res['option3']); ?></td>
                                            <td><?php echo htmlspecialchars($res['answer']); ?></td>
                                            <td><a class="btn btn-danger btn-sm" href="codes/delete_qstn.php?qid=<?php echo urlencode($res['demo_exam_id']); ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
