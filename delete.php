<?php

    $con=mysqli_connect('localhost','root','','cart');

?>




<?php
    
    $id=$_GET['id'];
    $sql="DELETE FROM `product` WHERE `id`='$id'";

    $result=mysqli_query($con,$sql);

    if($result){
        echo "<script>alert('product Delete successfully')</script>";
        echo "<script>location.href='admin.php'</script>";
    }

?>