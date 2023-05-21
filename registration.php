<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
<?php
    require_once ('php/header.php');
?>

<div class="container  mt-5 border border-secondary">
        <form class="py-3" action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" require name="name" placeholder="Ime:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" require name="lastname" placeholder="Prezime:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" require name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" require name="password" placeholder="Lozinka:">
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