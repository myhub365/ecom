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

<div class="container">
  <h2>Product Data</h2>
  <table class="table " style="background:#00000094;color:white">
    <thead>
      <tr>
        <th>ID</th>
        <th>IMG</th>
        <th>Name</th>
        <th>Delete Price</th>
        <th>Price</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>

    <?php

        $sql="SELECT * FROM `product` WHERE 1";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
?>


      <tr>
        <td><?php echo $row['id'] ?></td>
        <td><img src="img/<?php echo $row['img'] ?>" alt="" style="height:100px;width:100px;"></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['del'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger">Delete</a></td>

        <td><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-success">Update</a></td>
      </tr>
      <?php
      
        }
      ?>
    </tbody>
  </table>
</div>


</body>
</html>


