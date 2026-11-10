 <?php
 session_start();
 session_destroy();
 $home_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
 header('location:'.$home_url);
 ?>
<!--<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="refresh" content="0; index.php" />-->
        