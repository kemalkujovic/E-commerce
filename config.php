<?php
session_start();


$conn = mysqli_connect('localhost', 'root', '', 'user_db') or die('connection failed');
$product_db = mysqli_connect('localhost', 'root', '', 'shop_db') or die('connection failed');
?>