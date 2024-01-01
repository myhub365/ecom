<?php

    $con=mysqli_connect('localhost','root','','cart');

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
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
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

<?php
$id=$_GET['id'];
$sql="SELECT * FROM `product` WHERE `id`='$id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>

<div class="col-md-12 bg-dark p-5 text-light">
<center>
<form method="post" class="col-md-6" enctype="multipart/form-data">
  
  <div class="form-group">
    <!-- <label>Img:</label> --> <br>
    <input type="file" class="form-control" placeholder="Enter image" name="img" value="<?php echo $img ?>">
  </div>

  <div class="form-group">
    <!-- <label>Name:</label> --> <br>
    <input type="text" class="form-control" placeholder="Enter Your Product name" name="name" value="<?php echo $row['name'] ?>">
  </div>

  <div class="form-group">
    <!-- <label>Delete price:</label> --> <br>
    <input type="number" class="form-control" placeholder="Enter Delete price" name="dprice" value="<?php echo $row['del'] ?>">
  </div>

  <div class="form-group">
    <!-- <label>Price:</label> --> <br>
    <input type="number" class="form-control" placeholder="Enter image" name="price" value="<?php echo $row['price'] ?>">
  </div>
  
  <button type="submit" class="btn btn-outline-primary" name="sub">Submit</button>
</form></center>
</div>


<?php

        if(isset($_POST['sub'])){
            $img=$_FILES['img']['name'];
            $name=$_POST['name'];
            $dprice=$_POST['dprice'];
            $price=$_POST['price'];

            $sql="UPDATE `product` SET `img`='$img', `name`='$name', `del`='$dprice',`price`='$price' WHERE `id`='$id' ";

            $result=mysqli_query($con,$sql);

           

            if($result){
                echo "<script>alert('product Updated successfully')</script>";
                echo "<script>location.href='admin.php'</script>";
            }

            $target="img/";
            $file=$target.basename($img=$_FILES['img']['name']);
            $move=move_uploaded_file($img=$_FILES['img']['tmp_name'],$file);
        }

?>
</body>
</html>


