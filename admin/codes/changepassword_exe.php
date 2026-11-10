<?php
session_start();
require_once('../../connectionclass.php');
$uname=$_SESSION['email']; 
//echo $uname."<br>";
$obj=new ConnectionClass();
$page_action=$_REQUEST['action'];
//echo $page_action;
if($page_action=='update')
{
$qry="select password from login where username='$uname'";
$re=$obj->GetSingleData($qry);
//var_dump($re);
        $password = $_POST['password'];
        //echo $password."<br>";
        $newpassword = $_POST['newpassword'];
        //echo $newpassword."<br>";
        $confirmpassword = $_POST['confirmpassword'];
        //echo $confirmpassword."<br>";
        if($re==$password)
        {
            if($newpassword == $confirmpassword)
            {
                $qry="update login set password='$newpassword' where username='$uname'";
                $exe=$obj->Manipulation($qry);
                //var_dump($exe);
                if($exe['status']=='true')                
                {
                    echo $obj->alert("Congratulations You have successfully changed your password","../index.php");
                }
                else
                {
                    echo $obj->alert("Something Wrong","../changepassword.php");
                }
            }
            else
            {
                echo $obj->alert("Passwords do not match","../changepassword.php");
            }
        }
        else
        {
            echo $obj->alert("Current password you entered is incorrect","../changepassword.php");

        }
    }
    ?>
        