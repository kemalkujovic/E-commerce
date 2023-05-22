<?php
@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['repeat_password']);
    $jmbg = mysqli_real_escape_string($conn,$_POST['jmbg']);
    $broj_telefona = mysqli_real_escape_string($conn,$_POST['contact_number']);
    $user_type = $_POST['user_type'];
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
        $error[] = 'incorrect email or password';
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
    <title>Login Form</title>
</head>
<body>
<?php
    require_once ('php/header.php');
?>
<div class="container py-5">
      <form action="login.php" method="post">
      <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="submit" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>