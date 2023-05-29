<?php
session_start();
@include 'config.php';


if (!isset($_SESSION['user_name']) && !isset($_SESSION['admin_name'])) {
  header('location: index.php');
  exit();
}

if(isset($_POST['submit'])){
  $userID = $_SESSION['id'];
  $opwd = $_POST['opwd'];
  $npwd = $_POST['npwd'];
  $cpwd = $_POST['cpwd'];
  
  $query = mysqli_query($conn, "SELECT email, password from user_form where id = '$userID' AND password = '$opwd'");
  $num = mysqli_fetch_array($query);

  if($num > 0){

    $con = mysqli_query($conn, "UPDATE user_form set password = '$npwd' where id = '$userID'");
    $_SESSION['msg1'] = 'Password Change Succesfully';
  }else{
    $_SESSION['msg2'] = 'Password does not match';
    
  }



};


$userID = $_SESSION['id']; // ID korisnika čije podatke želite prikazati
$select = "SELECT * FROM user_form WHERE id = $userID";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);

// Prikazivanje podataka o korisniku
if ($row) {
  // u{00A0} RAZAMAK 
  $full_name = $row['ime'] . "\u{00A0}" . $row['prezime'];
} else {
    echo "Korisnik nije pronađen.";
}

// Oslobađanje rezultata upita
mysqli_free_result($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
  if (isset($_SESSION['poruka'])) {
    $poruka = $_SESSION['poruka'];
  
    // Prikazivanje poruke
    echo '<div>' . $poruka . '</div>';
  
    // Nakon što je poruka prikazana, možete je ukloniti iz sesije
    unset($_SESSION['poruka']);
  }
  ?>
<?php require_once("php/header.php")?>

<div class="container mb-5 mt-3">


<nav aria-label="breadcrumb" class="main-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    
  </ol>
</nav>

<div class="row gutters-sm">
  <div class="col-md-4 d-none d-md-block">
    <div class="card">
      <div class="card-body">
        <nav class="nav flex-column nav-pills nav-gap-y-1">
          <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Profile Information
          </a>
          <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>Security
          </a>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header border-bottom mb-3 d-flex d-md-none">
        <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
          <li class="nav-item">
            <a href="#profile" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
          </li>
        
          <li class="nav-item">
            <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></a>
          </li>
          
         
        </ul>
      </div>
      <div class="card-body tab-content">
        <div class="tab-pane active" id="profile">
          <h6>YOUR PROFILE INFORMATION</h6>
          <hr>
          <form>
            <div class="form-group">
              <label for="fullName">Full Name</label>
              <input type="text" disabled class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your fullname" value=<?php echo $full_name; ?>>
            </div>
            <div class="form-group">
              <label for="bio">Your Email</label>
              <input type="text" disabled class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your fullname" value=<?php echo $row['email'] ?>>
            </div>
            <div class="form-group">
              <label for="url">JMBG</label>
              <input type="text" disabled class="form-control" id="url" placeholder="Enter your website address" value=<?php echo $row['jmbg'] ?>>
            </div>
            <div class="form-group">
              <label for="location">Number</label>
              <input type="text" disabled class="form-control" id="location" placeholder="Enter your location" value=<?php echo $row['broj_telefona'] ?>>
            </div>
              
          </form>
          
        </div>
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
      </div>
            </div> 
            </div> 
            </div> 
            </div> 
        

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="footer fixed-bottom">
<?php require_once("php/footer.php")?>
</div>
</body>
</html>