<?php
include('config.php');

if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=1;

    //select cart data based on condition 
    $select_cart=mysqli_query($conn,"SELECT * FROM `cart` where `name` = '$product_name'");
    if(mysqli_num_rows($select_cart)>0){
        $display_message="product already added to cart";
    }else{
         // insert cart data into cart table
    $insert_query=mysqli_query($conn,"INSERT INTO `cart`(`name`, `price`, `image`, `quantity`) VALUES ('$product_name','$product_price','$product_image','$product_quantity')");
    $display_message="product  added to cart";
    }
    
      
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
     <!--css file-->
     <link rel="stylesheet" href="style.css">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    include('header.php');
    ?>

    <div class="container">
    <?php
   if(isset($display_message)){
    echo "    <div class='display_message'>
    <span>$display_message</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
</div>";
   }
    ?>

        <section class="products">
            <h1 class="heading">Let's Shop</h1>
            <div class="product_container">
                <?php
    $select_query=mysqli_query($conn,"SELECT * FROM `products` ");
    if(mysqli_num_rows($select_query)>0){
       while( $fetch_product=mysqli_fetch_assoc($select_query)){
     
         ?>

<form action="" method="post">
                <div class="edit_form">
                    <img src="./images/<?php echo $fetch_product['image']?>" alt="">
                    <h3><?php echo $fetch_product['name']?></h3>
                    <div class="price">price: Rs <?php echo $fetch_product['price']?></div>
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']?>">
                    <input type="submit" class="submit_btn cart_btn" value="Add to Cart" name="add_to_cart">
                </div>
                </form>
       <?php 
       }
    }else{
        echo "<div class='empty_text'>No products Available</div>";
    }
                ?>
       
            </div>
        </section>
    </div>
</body>
</html>