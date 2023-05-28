<?php
session_start();
@include 'config.php';
    if(isset($_POST['submit'])){
        $userID = $_SESSION['id'];
        $opwd = $_POST['opwd'];
        $npwd = $_POST['npwd'];
        $cpwd = $_POST['cpwd'];
        
        $query = mysqli_query($conn, "SELECT email, password from user_form where id = '$userID' AND password = '$opwd'");
        $num = mysqli_fetch_array($query);
      
        if($num > 0){

          $con = mysqli_query($conn, "UPDATE user_form set password = '$npwd' where id = '$userID'");
          echo 'Password Change Succesfully';
        }else{
          echo  'Password does not match';
          
        }
      
      };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="tab-pane" id="security">
                <h6>SECURITY SETTINGS</h6>
                <hr>
                <form name="chngpwd" action="" method="post" onSubmit="return valid();">
                  <div class="form-group">
                    <label class="d-block">Change Password</label>
                    <input type="text" name="opwd" class="form-control" placeholder="Enter your old password">
                    <input type="text" name="npwd" class="form-control mt-1" placeholder="New password">
                    <input type="text" name="cpwd" class="form-control mt-1" placeholder="Confirm new password">
                  </div>
                  <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                  <div>
                    </div>
                  </form>
                <hr>
                <form>
                 
              </div>
</body>
</html>