<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
      <!--font link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <!--header-->
   <?php  include "header.php"; ?>
    <!--container-->
    <div class="container">
      <div class="display_product">
         
               <!--php code-->
               <?php
                  
                  $sqldisplay = "SELECT * FROM `products`";
                  $resultdisplay = mysqli_query($conn,$sqldisplay);
                  if(mysqli_num_rows($resultdisplay)>0){
                      echo"          <table>
                      <thead>
                         <th>Sl. No</th>
                         <th>Product Image</th>
                         <th>Product Name</th>
                         <th>Product Price</th>
                         <th>Action</th>
                      </thead>
                      <tbody>";
                     while($row=mysqli_fetch_assoc($resultdisplay)){
                          $id = $row['id'];
                          $productname = $row['name'];
                          $productprice = $row['price'];
                          $productimage = $row['image'];
                        
                            echo '
                            <tr>
                            <td>'.$id.'</td>
                            <td><img src="images/'.$productimage.'"></td>
                            <td>'.$productname.'</td>
                            <td>'.$productprice.'</td>
                            <td>
                               <a href="delete.php?deleteid='.$id.'" class="delete_product_btn"  onclick="return confirm(\'Are you sure you want to delete product\');"><i class="fas fa-trash"></i></a>
                               <a href="update.php?updateid='.$id.'" class="update_product_btn"><i class="fas fa-edit"></i></a>
                            </td>
                         </tr>
                            ';
                            
                     }
                  }else{
                     echo "<div class='empty_text'>No products Available</div>";
                  }
                    
               ?>
                  
            </tbody>
         </table>
      </div>
    </div>
    <script>
      // function delete(){
      //    alert('Are you sure u want ot delete this product');
      // }

     
      </script>
</body>
</html>