<?php
session_start();


@include 'config.php';
require_once ("php/CreateDb.php");

$db = new CreateDb("Productdb", "Producttb");

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];


   $detail_query = mysqli_query($product_db, "INSERT INTO `order`(name, number,email,method, flat,street,city, state, country, pin_code) VALUES('$name','$number','$email','$method', '$flat', '$street', '$city', '$state', '$country','$pin_code')") or die('query failed');
   
   if($detail_query){
      echo "
      <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
     <div class='modal-dialog' role='document'>
       <div class='modal-content'>
       <div class='modal-header justify-content-center'>
       <h5 class='modal-title' id='exampleModalLongTitle'>Thanks for Shopping!</h5>
       
     </div>
         <div class='modal-body'>
         <p>Your name :  <span>".$name."</span></p>
         <p>Your number :  <span>".$number."</span></p>
         <p>Your email :  <span>".$email."</span></p>
         <p>Your address :  <span>".$flat.", ".$street.",".$city.", ".$state.", ".$country.",</span></p>
         <p>Your payment mode : <span>".$method."</span></p>
         <p>(*pay when products arrives*)<span></span></p>
         </div>
         <div class='modal-footer justify-content-center'>
         <a href='index.php' class='btn btn-primary btn-lg p-2'>Continue shopping</a>
         </div>
       </div>
     </div>
   </div>
      ";
   }
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style.css">
    <title>Checkout</title>
    <style>
      span{
         font-size: 20px;
         margin-bottom: 5px;
      }
      img{
         width: 150px;
      }
    </style>
   
<body>
<?php
    require_once ('php/header.php');
?>






<div class="container flex-wrap mt-3 " >

<section class="checkout-form">

   <h1 class="text-center">Complete your order</h1>
   
   <form action="" method="post">

   <div class="container border d-flex align-items-center flex-column overflow-auto">
<?php

$total = 0;
    if (isset($_SESSION['cart'])){
        $product_id = array_column($_SESSION['cart'], 'product_id');
        $select_products = mysqli_query($product_db, "SELECT * FROM `products`");
        $result = $db->getData();
        while($row = mysqli_fetch_assoc($select_products)){
         foreach ($product_id as $id){
         $p_image_folder = 'uploaded_img/'.$row['image'];
         if ($row['id'] == $id){
            $product_name = $row['name'];
                  $produce_image = $row['image'];
                  $product_price = $row['price'];
                  echo "<img class=\"img-fluid\" src={$p_image_folder}></img>";
                  echo "<h5>$product_name($$product_price)</h5>";
         $total = $total + (int)$row['price'];
         };
     }};
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($product_id as $id){
                if ($row['id'] == $id){
                  $product_name = $row['name'];
                  $produce_image = $row['image'];
                  $product_price = $row['price'];
                  echo "<img class=\"img-fluid\" src={$produce_image}></img>";
                  echo "<h5>$product_name($$product_price)</h5>";
                  $total = $total + (int)$row['price'];
                }
            }
        }
    }else{
        echo "<h5>Cart is Empty</h5>";
    }

?>
   <h2>Total: <?= $total; ?></h2>
</div>
   
         <div class="row">
            <div class="col d-flex flex-column ">
            <span>Your name</span>
            <input class="p-2" type="text" placeholder="Enter your name" name="name" required>         
            </div>
            <div class="col d-flex flex-column">
            <span>Your number</span>
            <input type="number" class="p-2" placeholder="Enter your number" name="number" required>
            </div>
         </div>


         <div class="row">
         <div class="col d-flex flex-column">
            <span>Your email</span>
            <input type="email" class="p-2" placeholder="Enter your email" name="email" required>
         </div>
            <div class="col d-flex flex-column">
               <span>Payment method</span>
               <select name="method" class="p-2">
                  <option value="cash on delivery" selected>Cash on devlivery</option>
                  <option value="credit cart">Credit cart</option>
                  <option value="paypal">Paypal</option>
               </select>
         </div>
           </div>
            <div class="row">
          <div class="col d-flex flex-column">
            <span>Address line 1</span>
            <input class="p-2" type="text" placeholder="E.g. flat no." name="flat" required>
         </div>
         <div class="col d-flex flex-column">
            <span>Address line 2</span>
            <input class="p-2" type="text" placeholder="E.g. street name" name="street" required>
         </div>
         </div>
         <div class="row">
          <div class="col d-flex flex-column">
            <span>City</span>
            <input class="p-2" type="text" placeholder="E.g. Novi Pazar" name="city" required>
         </div>
         <div class="col d-flex flex-column">
            <span>State</span>
            <input class="p-2" type="text" placeholder="E.g. ras" name="state" required>
         </div>
</div>
         <div class="row">
         <div class="col d-flex flex-column">
            <span>Country</span>
            <input class="p-2" type="text" placeholder="E.g. Serbia" name="country" required>
         </div>
         <div class="col d-flex flex-column">
            <span>Pin code</span>
            <input class="p-2" type="text" placeholder="E.g. 123456" name="pin_code" required>
         </div>
         </div>
         <input type="submit"  value="Order Now" name="order_btn" class="btn btn-primary w-100 p-2 mb-3 mt-3">  
      </div>
   </form>


<!-- Modal -->

</section>

</div>
<?php require_once("php/footer.php")?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var detailQuery = <?php echo ($detail_query ? 'true' : 'false'); ?>;
        if (detailQuery) {
            var modal = document.getElementById("exampleModal");
            var modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>