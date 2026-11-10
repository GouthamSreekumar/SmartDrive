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
            <!-- Add any dashboard content here if needed -->
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="span_11">
        <div class="col-md-6 col_4">
            <!-- Optional: Add content like maps or charts here -->
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

                <?php
                require_once("../connectionclass.php");
                $obj = new ConnectionClass();
                $qry = "select * from demo_exam";
                $result = $obj->GetTable($qry);
                ?>

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
                            $i = 0;
                            foreach ($result as $res) {
                                $i++;
                            ?>
                            <tr data-expanded="true">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $res['question_text']; ?></td>
                                <td><?php echo $res['option1']; ?></td>
                                <td><?php echo $res['option2']; ?></td>
                                <td><?php echo $res['option3']; ?></td>
                                <td><?php echo $res['answer']; ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="codes/delete_qstn.php?qid=<?php echo $res['demo_exam_id']; ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
