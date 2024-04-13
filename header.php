
<?php
include('config.php');
?>
  <!--header section start -->
<header class="header">
<div class="header_body">
    <a href="index.php" class="logo">Shoping Cart</a>
    <nav class="navbar">
        <a href="index.php">Add Products</a>
        <a href="viewproduct.php">View Products</a>
        <a href="shop.php">Shop IT</a>
    </nav>
    <!--select query--> 
    <?php
        $select_product=mysqli_query($conn,"SELECT * FROM `cart`") or die('query failed');
        $row_count=mysqli_num_rows($select_product);
       
    ?>
    <!--shoping cart icon-->
    <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $row_count?></sup></span></a>
    <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
</div>

</header>

<!--header section end -->
