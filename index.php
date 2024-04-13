<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!--css file-->
    <link rel="stylesheet" href="style.css">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<?php
include('header.php');
include('config.php');

if(isset($_POST['add_product'])){

    $productname = $_POST['product_name'];
    $productprice = $_POST['product_price'];
    $productimage = $_FILES['product_image']['name'];
    $producttempimage = $_FILES['product_image']['tmp_name'];
    $productimagefolder = 'images/'.$productimage;

    $sql = "INSERT INTO `products`( `name`, `price`, `image`) VALUES ('$productname','$productprice','$productimage') ";
    $result = mysqli_query($conn, $sql);

    if($result){
        move_uploaded_file($producttempimage,$productimagefolder);
       $display_message = "Product Sucessfully Inserted";
    }else{
       $display_message =  "Product not Inserted";
    }
}

?>


<!--form section start-->
<div class="container">

<!--message display-->
<?php


if(isset($display_message)){

    echo "<div class='display_message'>
    <span>$display_message </span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
</div>";
}


?>

    <section>
        <h3 class="heading">Add Products </h3>
        <form action="" class="add_product" method="post" enctype="multipart/form-data">
            <input type="text" name="product_name" class="input_fields" placeholder="Enter product name" required>
            <input type="number" min="0" name="product_price" class="input_fields" placeholder="Enter product price" required>
            <input type="file" name="product_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg">
            <input type="submit" name="add_product" class="submit_btn" value="Add Product">
        </form>
    </section>
</div>
<!--form section end--> 
 

 


<script src="./js/main.js"></script>
</body>
</html>