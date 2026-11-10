<?php
require_once('header.php');
require_once("connectionclass.php");
$obj = new ConnectionClass();
$qry = "select * from course where c_status='active'";
$re = $obj->GetTable($qry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Driving School a Business Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Driving School Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script src="js/main.js"></script>
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
    <link href="//fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
</head>
<body>
    <!-- //banner -->
    <!-- contact -->        
    <div class="contact"> 
        <div class="container">
            <div class="w3l-heading">
                <h3 class="w3ls_head">Register Now</h3>
            </div>
            <div class="contact-agileinfo">
                <div class="col-md-3 contact-right"> 
                </div>
                <div class="col-md-6 contact-right"> 
                    <form method="post" enctype="multipart/form-data" action="codes/student_registration_exe.php"> 
                        <input type="text" class="form-control" name="username" placeholder="Name" pattern="[a-zA-Z ]+" title="Characters only" required=""><hr>

                        <input type="text" class="form-control" name="address" placeholder="Address" pattern="/^[a-zA-Z0-9 _-.,:']+$/" title="Must contain alphabets and numbers" required=""><hr>

                        <input type="email" class="form-control" name="email" placeholder="E_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a Valid Email ID" required=""><hr>

                        <input type="text" class="form-control" name="contact_no" placeholder="Contact No" pattern="[9876][0-9]{9}" title="Enter a valid mobile number" maxlength="10" minlength="10" required=""><hr>

                        <?php
                        $dob = date('Y-m-d', strtotime('-18 years'));
                        ?>
                        <h6>Date of birth</h6> 
                        <input type="date" class="form-control" name="dob" placeholder="DOB" pattern="/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/" title="Follow mm/dd/yyyy format" max='<?php echo $dob; ?>' required=""><hr>

                        <h6>Password</h6> 
                        <input type="password" class="form-control" name="password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$" title="Password must be at least 8 characters long and include at least one letter and one digit" required><hr>

                        <h6>Upload Profile Photo</h6> 
                        <input type="file" class="form-control" name="fileToUpload" required="" /><hr>
                        
                        <select name="gender" class="form-control" required="">
                            <option value="">--Select Gender--</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select><hr>

                        <select class="form-control" name="course_id" required="">
                            <option value="">--Select Course --</option>
                            <?php
                            foreach ($re as $r) {
                                echo "<option value='{$r['course_id']}'>{$r['name']} ({$r['duration']})</option>";
                            }
                            ?>
                        </select><hr>

                        <div class="clearfix"></div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-info">Cancel</button><br><br>
                    </form>
                </div>
                <div class="col-md-3 contact-left">
                </div>
            </div>
        </div> 
    </div>
    <!-- //contact -->  
    <?php require_once("footer.php"); ?>
    <!-- start-smooth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smooth-scrolling -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
</body>
</html>
