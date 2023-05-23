<?php
session_start();
@include 'config.php';
if (isset($_SESSION['user_name']) || isset($_SESSION['admin_name'])) {
    header('location: index.php');
    exit();
}


if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
        
        if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['ime'];  
           header('location:index.php');
  
           exit();
        }elseif($row['user_type'] == 'user'){
            $_SESSION['user_name'] = $row['ime'];
           header('location: index.php');
            exit();
        }

    }else{
        $error[] = 'Incorrect email or password';
    }

};


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body>
<?php
    require_once ('php/header.php');
?>
<div class="container py-5">
      <form action="login.php" method="post">
      
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
        <div class="form-btn">
            <input type="submit" value="Login" name="submit" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>