<?php
session_start();


@include 'config.php';
require_once ("php/CreateDb.php");

$db = new CreateDb("Productdb", "Producttb");


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
</head>
<body>
<?php
    require_once ('php/header.php');
?>






<div class="container flex-wrap bg-secondary mt-3 " >

<section class="checkout-form">

   <h1 class="text-center">Complete your order</h1>
   
   <form action="" method="post">

   <div class="container border d-flex align-items-center flex-column overflow-auto">
<?php

$total = 0;
    if (isset($_SESSION['cart'])){
        $product_id = array_column($_SESSION['cart'], 'product_id');

        $result = $db->getData();
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($product_id as $id){
                if ($row['id'] == $id){
                  $product_name = $row['product_name'];
                  $produce_image = $row['product_image'];
                  $product_price = $row['product_price'];
                  echo "<img class=\"img-fluid\" src={$produce_image}></img>";
                  echo "<h5>$product_name($$product_price)</h5>";
                  $total = $total + (int)$row['product_price'];
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
         <input type="submit" value="Order Now" name="order_btn" class="btn btn-primary w-100 p-2 mb-3 mt-3">  
      </div>
   </form>

</section>

</div>
<?php require_once("php/footer.php")?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>