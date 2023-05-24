<?php
@include 'config.php';

// if (!isset($_SESSION['admin_name'])) {
//     header('location: index.php');
//     exit();
// }



if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_description = $_POST['p_description'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;

    $insert_query = mysqli_query($product_db, "INSERT INTO `products`(name, price, image,description) VALUES('$p_name', '$p_price', '$p_image', '$p_description')") or die('query failed');

    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Product add succesfully';
    }else{
        $message[] = 'could not add the product';

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./admin.css">
    <title>Admin Page</title>
</head>
<body>
    
<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="product-msg"><span>'.$message.'</span><i class="fa-solid fa-x" onclick="this.parentElement.style.display = `none`;"></i></div>';
    };
};
?>
<?php require_once("php/header.php")?>
<div class="container mt-5 bg-secondary w-50">
<section >
    <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
    <h3 class="text-white pt-3">Add a new product</h3>
    <input type="text" name="p_name" placeholder="Enter the product name" class="w-100 mt-3" required>
    <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="w-100 mt-3" required>
    <input type="text" name="p_description" placeholder="Enter the product description" class="w-100 mt-3" required>
    <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="w-100 mt-3 bg-light" required>
    <input type="submit" value="Add the product" name="add_product" class="btn btn-primary w-100 mb-3 mt-3">
    </form>
</section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>