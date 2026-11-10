<?php
require_once('header.php');
require_once("../connectionclass.php");

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$obj = new ConnectionClass();
$email = $_SESSION['email'];

// Fetch the instructor's registration ID
$qry1 = "SELECT * FROM registration WHERE email = '$email'";
$result1 = $obj->GetSingleRow($qry1);

if ($result1) {
    $inid = $result1['registration_id'];

    // Fetch notifications for the instructor
    $qry = "SELECT * FROM notification 
            JOIN batch ON notification.batch_id = batch.batch_id 
            JOIN registration ON batch.instructor_id = registration.registration_id 
            WHERE email = '$email' AND n_status = 'active';";

    $result = $obj->GetTable($qry);

    if ($result && count($result) > 0) {
        // Continue with the rest of your code
        ?>
        <!DOCTYPE HTML>
        <html>
        <body>
        <?php
        require_once("sidebar.php");
        ?>
        <div id="page-wrapper">
            <div class="graphs">
                <div class="col_3">
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="span_11">
                <div class="col-md-6 col_4">
                    <!-- Additional content like maps or charts can be added here -->
                </div>
            </div>
            <div class="content_bottom">
                <div class="col-md-12 span_3">
                    <div class="bs-example1" data-example-id="contextual-table">
                        <h3>Notifications</h3>
                        <section class="wrapper">
                            <div class="table-agile-info">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Notification
                                    </div>
                                    <div>
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
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Post Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($result as $data){
                                                 ?>
                                                    <tr data-expanded="true">
                                                      <td><?php echo $data['n_title']; ?></td>
                                                      <td><?php echo $data['description']; ?></td>
                                                      <td><?php echo date('d-m-Y', strtotime($data['post_date'])); ?></td>
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
        <script src="js/bootstrap.min.js"></script>
        <?php
        require_once('footer.php');
        ?>
        </body>
        </html>
        <?php
    } else {
        echo "No notifications found.";
    }
} else {
    echo "Instructor not found.";
}
?>
