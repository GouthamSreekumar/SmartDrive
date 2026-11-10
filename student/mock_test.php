<!DOCTYPE HTML>
<html>
<?php
session_start();
require_once('header.php');
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$uname = $_SESSION['email'];
$qry = "SELECT * FROM demo_exam";
$result = $obj->GetTable($qry);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    $total_questions = count($result);

    foreach ($result as $question) {
        $question_id = $question['demo_exam_id'];
        $user_answer = isset($_POST["answer_$question_id"]) ? $_POST["answer_$question_id"] : '';
        $correct_answer = $question['answer'];

        if ($user_answer === $correct_answer) {
            $score++;
        }
    }

    $percentage = ($total_questions > 0) ? ($score / $total_questions) * 100 : 0;

    // Store results in session
    $_SESSION['test_score'] = $score;
    $_SESSION['total_questions'] = $total_questions;
    $_SESSION['test_percentage'] = $percentage;

    // Insert result into database
    $insert_qry = "INSERT INTO test_results (user_email, score, total_questions) VALUES ('$uname', $score, $total_questions)";
    $obj->Manipulation($insert_qry);

    // Redirect to results page
    header("Location: test_results.php");
    exit();
}
?>
<body>
<?php require_once("sidebar.php"); ?>
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
                <h3>Mock Test</h3>
                <section class="wrapper">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Answer all questions
                            </div>
                            <div>
                                <form method="post" action="">
                                    <table class="table" ui-jq="footable" ui-options='{
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
                                                <th>Number</th>
                                                <th>Question</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach($result as $row) { $i++; ?>
                                                <tr data-expanded="true">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo htmlspecialchars($row['question_text']); ?></td>
                                                    <td>
                                                        <input type="radio" name="answer_<?php echo $row['demo_exam_id']; ?>" value="<?php echo htmlspecialchars($row['option1']); ?>" required> <?php echo htmlspecialchars($row['option1']); ?><br>
                                                        <input type="radio" name="answer_<?php echo $row['demo_exam_id']; ?>" value="<?php echo htmlspecialchars($row['option2']); ?>"> <?php echo htmlspecialchars($row['option2']); ?><br>
                                                        <input type="radio" name="answer_<?php echo $row['demo_exam_id']; ?>" value="<?php echo htmlspecialchars($row['option3']); ?>"> <?php echo htmlspecialchars($row['option3']); ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <input type="submit" value="Finish Test" class="btn btn-primary">
                                    </div>
                                </form>
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
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<?php require_once('footer.php'); ?>
</body>
</html>