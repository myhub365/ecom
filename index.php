<?php

    $con=mysqli_connect('localhost','root','','cart');
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
 .menu{
  color:yellow
 }
 .menu:hover{
  color:yellow;
  font-weight:900
 }
</style>

</head>
<body style="background-image:url('img/bg.jpg');background-size:cover">

<nav class="navbar navbar-expand-md  navbar-dark sticky-top" style="background:#00000045;color:white">
  <a class="navbar-brand" href="product.php" style=" color:yellow;font-weight:900;font-style:italic;text-shadow:0px 5px 10px pink,0px 5px 10px pink">BRAND FACTORY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link menu" href="index.php"  ><span class="menu">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link menu" href="product.php" ><span class="menu">Product</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link menu" href="admin.php" ><span class="menu">Admin</span></a>
      </li>  
      <li class="nav-item">
        <a class="nav-link menu" href="checkout.php" ><span class="menu">Checkout</span></a>
      </li>  
    </ul>

    <a class="btn btn-danger ml-auto" href="checkout.php">Cart <span>
    
<?php

        if(isset($_SESSION['cart'])){
            echo count($_SESSION['cart']);
        }
        else{
            echo "0";
        }

?>


</span></a>
  </div>  
</nav>
<br>

<div class="col-md-12  p-5 text-light">
<center>
<form method="post" class="col-md-6" enctype="multipart/form-data">
  
  <div class="form-group">
    <!-- <label>Img:</label> --> <br>
    <input type="file" class="form-control" placeholder="Enter image" name="img">
  </div>

  <div class="form-group">
    <!-- <label>Name:</label> --> <br>
    <input type="text" class="form-control" placeholder="Enter Your Product name" name="name">
  </div>

  <div class="form-group">
    <!-- <label>Delete price:</label> --> <br>
    <input type="number" class="form-control" placeholder="Enter Delete price" name="dprice">
  </div>

  <div class="form-group">
    <!-- <label>Price:</label> --> <br>
    <input type="number" class="form-control" placeholder="Enter image" name="price">
  </div>
  
  <button type="submit" class="btn btn-warning" name="sub">Submit</button>
</form></center>
</div>


<?php

        if(isset($_POST['sub'])){
            $img=$_FILES['img']['name'];
            $name=$_POST['name'];
            $dprice=$_POST['dprice'];
            $price=$_POST['price'];

            $sql="INSERT INTO `product` (`img`,`name`,`del`,`price`) VALUES ('$img','$name','$dprice','$price')";

            $result=mysqli_query($con,$sql);

           

            if($result){
                echo "<script>alert('product added successfully')</script>";
                echo "<script>location.href='admin.php'</script>";
            }

            $target="img/";
            $file=$target.basename($img=$_FILES['img']['name']);
            $move=move_uploaded_file($img=$_FILES['img']['tmp_name'],$file);
        }

?>
</body>
</html>


