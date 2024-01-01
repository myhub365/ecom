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

    <a class="btn btn-danger ml-auto" href="checkout.php">Cart 

                    <?php

        if(isset($_SESSION['cart'])){
            echo count($_SESSION['cart']);
        }
        else{
            echo "0";
        }

?>


                </a>
        </div>
    </nav>




    <div class="col-md-12" style="height:100px;"></div>
    <div class="col-md-12">
        <center>
            <h1 style="color:blue;border:4px dotted green;width:300px"> All Product </h1>
        </center>
    </div>
    <div class="container">
    <div class="col-md-12">
        <div class="row">

            <?php

        $sql="SELECT * FROM `product` WHERE 1";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
?>




  
  <div class="col-md-3"><div class="card " >
    <img class="card-img-top" src="img/<?php echo $row['img'] ?>" alt="Card image" style="height:230px;width:100%">
    <div class="card-body">
      <h4 class="card-title"><center><?php echo $row['name'] ?></center></h4>

      <h3 class="text-center bg-light text-dark"><del>₹
                            <?php echo $row['del'] ?>
                        </del> <span>₹
                            <?php echo $row['price'] ?>
                        </span> </h3>
      <center>
                        <form method="post">
                        <input type="number" name="q" min="1" max="5" value="1" placeholder="Quantity" required>
                        <input type="hidden" class="form-control" name="img" value="<?php echo $row['img'] ?>">
                        <input type="hidden" class="form-control" placeholder="Enter Your Product name" name="name"
                            value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="form-control" placeholder="Enter Your Product name" name="dprice"
                            value="<?php echo $row['del'] ?>">
                        <input type="hidden" class="form-control" placeholder="Enter Your Product name" name="price"
                            value="<?php echo $row['price'] ?>">
                        <br><br>
                        <button type="submit" class="btn btn-outline-primary col-md-12" name="cartad">Add To Cart </button>

                    </form></center>
    </div>
  </div>

  </div>
            <?php
        }

        ?>

            <?php
                        if(isset($_POST['cartad'])){
                            $_SESSION['cart'][] = array(
                                'id' => rand(100,1000),
                                'q' => $_POST['q'],
                                'img' => $_POST['img'],
                                'name' => $_POST['name'],
                                'del' => $_POST['dprice'],
                                'price' => $_POST['price'],
                                

                            );
                            echo "<script>location.href = 'product.php'</script>";
                        }

?>

        </div>
    </div>



    </div>





</body>

</html>