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

    <a class="btn btn-danger" href="checkout.php?empty=1">EmptyCart</a>

    <?php

        if(isset($_GET['empty'])){
            unset($_SESSION['cart']);
        }
?>

    <div class="container">
        <div class="com-md-12">
            <div class="row">

           <div class="col-md-8">
        <h2 class="text-warning">Cart Data</h2>
        <table class="table table-dark table-hover">
            <thead>
                <tr>

                    <th>IMG</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Delete Price</th>
                    <th>Price</th>
                    <th>Remove</th>

                </tr>
            </thead>
            <tbody>

                <?php
        if(isset($_SESSION['cart'])):
        
            foreach($_SESSION['cart'] as $k => $row):
                ?>

                <tr>

                    <td><img src="img/<?php echo $row['img'] ?>" alt="" style="height:100px;width:100px;"></td>
                    <td><?php echo $row['name'] ?> </td>
                    <td><?php echo $row['q'] ?> </td>
                    <td><?php echo $row['del'] *  $row['q'] ?> </td>
                    <td><?php echo $row['price']  *  $row['q'] ?> </td>
                    <td><a href="checkout.php?remove=<?php echo $row['id'] ?>" class="btn">
                    <span class="text-danger">&times;</span> </a> </td>

                </tr>



                <?php 
      
                        endforeach ;
                        endif;
                ?>



            <?php

                if(isset($_GET['remove'])){
                    $id= $_GET['remove'];
                    foreach($_SESSION['cart'] as $k => $part){
                        if($id == $part['id']){
                            unset($_SESSION['cart'][$k]);
                            echo "<script>location.href = 'checkout.php'</script>";
                        }
                    }
                }
            ?>

            </tbody>
        </table>
    </div>

 <?php

        $totalPrice = 0;

                
            if(isset($_SESSION['cart'])){

                $cart = $_SESSION['cart'];


                function total($cart){
                    $totalPrice = 0;

                    foreach ($cart as $item) {
                    $totalPrice += $item['price'] * $item['q'];
                    }

                     return $totalPrice;
                }

        $totalPrice = total($cart);

            }



?>

    <div class="col-md-4 bg-info">
        <div>
           <h3> <span class="ml-auto"><?php echo "Total Price: ₹" . $totalPrice; ?></span></h2>
        </div>

        <div class="btn btn-success"> Proceed to Checkout</div>
    </div>
</div>
    </div>
        </div>

</body>

</html>