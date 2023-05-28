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
            $_SESSION['id'] = $row['id'];
           header('location:index.php');
  
           exit();
        }elseif($row['user_type'] == 'user'){
            $_SESSION['user_name'] = $row['ime'];
            $_SESSION['id'] = $row['id'];
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
            <input type="email" placeholder="Enter Email:" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control" required>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>