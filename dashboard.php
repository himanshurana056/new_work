<?php
session_start();

require_once('./common_files/common_functions.php');
$commonFunction = new CommonFunctions;
$commonFunction->redrectToLogin();

if (isset($_GET) && $_GET['logout'] == 'true'){
    $commonFunction = new CommonFunctions;
    $commonFunction->userLogout();
}


?>


<?php include_once('./partials/header.php');?>
<center>
i m here <?php echo $_SESSION['user']['first_name'] ." ". $_SESSION['user']['last_name'];?>
<a href='dashboard.php?logout=true'>Logout</a>
</center>
<?php include_once('./partials/footer.php');?>