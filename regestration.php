
<?php
 include_once('./common_files/database_query.php');
 include_once('./common_files/validation/user_validate.php');
 require_once('./common_files/common_functions.php');
 
 if(isset($_POST['submit'])){
    $validations = new Validations;

    $errors = $validations->userValidate($_POST);


    if (count($errors) == 0){
        $commonFunctions = new CommonFunctions;
        $encrypted_password = $commonFunctions->encryptPassword($_POST['password']);

        $dbQueries =  new DbQueries;

        $dbQueries->userSave($_POST, $encrypted_password);
  
  
    }
 }

?>
<?php include_once('./partials/header.php');?>
<center>
            <div class="container">
            <div class="col-md-12 ">
            <form action=""  method="POST" novalidate>


             
            <div class= "col-md-8">
             <h1><b> USER REGESTRATION</h1>
             <div class="form-group">
                <label>FIRST NAME :</label>
                <input type="text" class="form-control col-lg "  placeholder="enter name" name="first_name" id="first_name"/>
                <small><?php if (isset($errors['first_name'])) echo $errors['first_name']; ?></small>
                
              </div>
              
              <div class="form-group">
                <label>LAST NAME :</label>
                <input type="text" class="form-control col-lg "  placeholder="enter name" name="last_name" id="last_name">
                <small><?php if (isset($errors['last_name'])) echo $errors['last_name']; ?> </small>
              </div>
        
              
              
              <div class="form-group">

              <label>GENDER :</label><br>
             <small> <input type="radio" name="gender" id="gender" value="male"> Male
              <input type="radio" name="gender" id="gender" value="female"> Female
              <input type="radio" name="gender"  id="gender" value="other"> Other</small> <br>
              <small><?php if (isset($errors['gender'])) echo $errors['gender']; ?> </small>
            </div>  
            <br>    




            <div class="form-group">
                <label>EMAIL ID :</label>
              
                <input type="email" class="form-control col-lg "  placeholder="name@ example.com" name="email" id="email">
                <small><?php if (isset($errors['email'])) echo $errors['email']; ?></small>
              </div>

              <div class="form-group">
                <label>PASSWORD :</label>
                <input type="pass" name="password" class="form-control col-lg " id="password">
                <small><?php if (isset($errors['password'])) echo $errors['password']; ?></small>
              </div>

              <div class="form-group">
                <label>CONFIRM PASS:</label>
                <input type="password" name="confirm_password"class="form-control col-lg "  placeholder="" id="confirm_password">
                <small><?php if (isset($errors['confirm_password'])) echo $errors['confirm_password']; ?></small>
              </div>

              <div class="form-group">
                <label>ADDRESS:</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="enter address">
                <small><?php if (isset($errors['address'])) echo $errors['address']; ?></small>
              </div>

            

              <div class="form-group">
                  <label>CITY</label>
                  <input type="text" name="city" class="form-control" id="city">
                  <small><?php if (isset($errors['city'])) echo $errors['city']; ?></small>
                </div>
              
                <div class="form-group">
                <label>STATE</label>  
                  <select id="state" name="state"class="form-control">
                    <option selected></option>
                    <option>una</option>
                    <option>delhi</option>
                    <option>himachal</option>
                    <option>chandigarh</option>
                  </select>
                  <small><?php if (isset($errors['state'])) echo $errors['state']; ?></small>
                </div>

              
                <div class="form-group">
                  <label>ZIP</label>
                  <input type="number" name= "zip_code"class="form-control" id="zip_code">
                  <small><?php if (isset($errors['zip_code'])) echo $errors['zip_code']; ?></small>
                
                </div>


                <div class="form-group">
                <label> IMAGE UPLOAD </label>
                <input type ="file" name= "image_upload"  id="image_upload"class = "form-control">
                <small><?php if (isset($errors['file'])) echo $errors['file']; ?> </small>
                </div>
                
                <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" name= "checkbox" id="checkbox">
                    Check me out
                    <small><?php if (isset($errors['checkbox'])) echo $errors['checkbox']; ?> </small>
                    <div class="form-group">
                
                  <input type="submit" name="submit" value="submit" class="btn btn-success" >
                </div>
            </form>

            </div>
</div>
  </center>          

<?php include_once('./partials/footer.php');?>


