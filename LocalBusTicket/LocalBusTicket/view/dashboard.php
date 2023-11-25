<?php
session_start();

//validation
if(!isset($_SESSION['email'])){
    header('location: ../controler/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php
    include '../view/navbar.php';
    ?>
<table align="center">
    <tr>
    <td></td>
        <td></td>
        <td>
        <a href="../index.php"><img src="../images/passenger-management.png" height="80px" width="80px" alt=""></a>
        <a href="../index.php"> <h5 style="color:red">Passengers Management</h5 style="color:black"> </a>
            
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <a href="../view/roadInfoView.php"><img src="../images/route-info.png" height="80px" width="80px" alt=""></a>
        <a href="../view/roadInfoView.php"> <h5 style="color:red">Route Information</h5 style="color:black"> </a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <a href="../index.php"><img src="../images/trip.png" height="80px" width="80px" alt=""></a>
        <a href="../index.php"><h5 style="color:red">Trip Management</h5 style="color:black"></a>
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr><tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr><tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr><tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr><tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
    <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <a href="../index.php"><img src="../images/vehicle-manage.png" height="80px" width="80px" alt=""></a>
        <a href="../index.php"> <h5 style="color:red">Vehicle Management</h5 style="color:black"></a>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <a href="../index.php"><img src="../images/communication.png" height="80px" width="80px" alt=""></a>
        <a href="../index.php"> <h5 style="color:red">Communication</h5 style="color:black"> </a>
        </td>
    </tr>
</table>

<form action="">
<h3 align="center">Click here to <a style="color:white;text-decoration:none;text-transform:uppercase;font-weight:bold;background:red;padding:5px 10px;border-radius:5px;" href="../controler/logout.php">Logout</a></h3>
</form>
    
    <?php
    include '../view/footer.php';
    ?>
</body>
</html>