<?php 
session_start();
if($_POST['submit']){


        include_once('./common_files/validation/user_validate.php');
        $validations = new Validations();
        $errors = $validations->userlogin($_POST);

        if (empty($errors)) {
          include_once('./common_files/database_query.php');
          require_once('./common_files/common_functions.php');
          
          $dbQueries = new DbQueries();
          $commonFunctions = new CommonFunctions();
          $userDetail = $dbQueries->login_user($_POST, $commonFunctions);
          if($userDetail){
            $_SESSION['user'] = $userDetail;
            $_SESSION['login'] = true;
            header('Location: http://localhost/new_work/dashboard.php');
          }
      }

}

?>



<?php include_once('./partials/header.php');?>

<div class="container">
          <center>  <div class="col-md-8 ">
            <form action=""  method="POST">


             
            <div class= "col-md-8">
                <label>EMAIL :</label>
                <input type="text" class="form-control col-lg "  placeholder="enter Email" name="email" id="eamil"/>
                <small><?php if (isset($errors['email'])) echo $errors['email']; ?></small>
              </div>
              
              <div class ="col-md-8">
                <label>Password :</label>
                <input type="password" class="form-control col-lg " name="password" id="password">
                <small><?php if (isset($errors['password'])) echo $errors['password']; ?></small>
                </div>
                
                <div class="col-md-8">
                
                <input type="submit" name= "submit" value="Login" class="btn btn-success" >
              </center>
              </div>
              </div>
              </div>
</form>
<?php include_once('./partials/footer.php');?>