<?php
@include 'config.php';

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;

    $insert_query = mysqli_query($product_db, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <title>Admin Page</title>
</head>
<body>
    
<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span><i class="fas fa times" onclick="this.parentElement.style.display = `none`;"></i></div>';
    };
};
?>

<div class="container">

<section>
    <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
    <h3>Add a new product</h3>
    <input type="text" name="p_name" placeholder="Enter the product name" class="card" required>
    <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="card" required>
    <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
    <input type="submit" value="Add the product" name="add_product" class="btn">
    </form>
</section>
</div>


</body>
</html>