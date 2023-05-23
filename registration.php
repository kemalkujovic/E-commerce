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

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        $error[] = 'user alredy exist!';
    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_form(ime, prezime, email,password,jmbg,broj_telefona, user_type) VALUES('$name', '$lastname', '$email', '$pass', '$jmbg','$broj_telefona', '$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
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
    <script defer src="js/Validation.js"></script>
    <title>Registration</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php
    require_once ('php/header.php');
?>

<div class="container  mt-5 border border-secondary">
        <form class="py-3" action="registration.php" method="post" onsubmit="return validateForm()">
            
            <div class="form-group">
                <input type="text" class="form-control" id="name" require name="name" placeholder="Ime:">
                <span id="nameError" class="error"></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" require name="lastname" id="lastName" placeholder="Prezime:">
                <span id="lastNameError" class="error"></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" require name="email" placeholder="Email:">
                <span id="emailError" class="error"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" require name="password" placeholder="Lozinka:">
                <span id="passwordError" class="error"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" require name="repeat_password" placeholder="Ponovite Lozinku:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" require name="place_birth" placeholder="Mesto rodjenja:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" require name="country_birth" placeholder="Drzava rodjenja:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" require min=8  name="jmbg" placeholder="JMBG:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" require min=8  name="contact_number" placeholder="Kontakt mobilini telefon:">
            </div>
            <select class="form-control" name="user_type">
                <option  value="user">User</option>
                <option  value="admin">Admin</option>
            </select>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
            <div class="form-btn py-3">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>