<?php
    session_start();
    if(isset($_SESSION['username'])){
        //Home Access //
        echo "<h1> Welcome ".$_SESSION['username']."</h1><br>";      
        // See Content//
        // include 'product.php';
        echo "<br><a href='logout.php'><input type='button' value='Logout' name='logout'></a><br>";
    }
else{
    echo "<script>alert('Login first to access Homepage!!!')</script>";  // if not match the alert msg is shown//
    echo "<script> location.href='login.html' </script>";
}