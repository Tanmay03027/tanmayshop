<?php
include('config.php');

// Fetching data to populate the form
if(isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    
    // Query to select the record with the given ID
    $query = "SELECT * FROM `products` WHERE id = $id";
    
    // Executing the query
    $result = mysqli_query($conn, $query);
    
    // Checking if the query was successful
    if($result) {
        // Fetching the data as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Storing fetched data into variables
        $name = $row['name'];
        $price = $row['price'];
        // Assuming 'image' is the column name for the image path
        $image = $row['image'];
    } else {
        echo "Error fetching data: " . mysqli_error($conn);
    }
}

// Updating data
if(isset($_POST['update'])) {
    // Retrieving form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productimage = $_FILES['image']['name'];
    $producttempimage = $_FILES['image']['tmp_name'];
    $productimagefolder = 'images/'.$productimage;

    // Updating the record in the database
    $update_query = "UPDATE `products` SET `name`='$name',`price`='$price',`image`='$productimage' WHERE id = $id";
    
    // Executing the update query
    $update_result = mysqli_query($conn, $update_query);
    
    // Checking if the update was successful
    if($update_result) {
        move_uploaded_file($producttempimage,$productimagefolder);
        echo "Data updated successfully!";
        // Redirecting to a page where you want to display the updated data
        header('Location: viewproduct.php');
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <!--css file-->
    <link rel="stylesheet" href="style.css">
    <!--font link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include('header.php') ?>
    <form action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
        <img src="./images/<?php echo $image ?>" alt="Image">
        <!-- Hidden input to store the ID -->
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="text" name="name" class="input_fields fields" required value="<?php echo $name ?>">
        <input type="number" name="price" class="input_fields fields" required value="<?php echo $price ?>">
        <input type="file"  class="input_fields fields" name="image">
        <input type="submit" name="update" class="edit_btn">
        <input type="reset" class="cancel_btn" id="close-edit" value="Cancel">
    </form>
    <section class="edit_container">
        <!-- Form -->
    </section>
</body>
</html>
