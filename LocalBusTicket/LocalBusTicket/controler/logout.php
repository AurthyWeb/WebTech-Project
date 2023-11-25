<?php 
session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
    header("location:../controler/Login.php");
}
else {
    header("location:../controler/Login.php");
}

?>