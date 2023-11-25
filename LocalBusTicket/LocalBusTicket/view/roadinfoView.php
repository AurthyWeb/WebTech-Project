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
    <title>Document</title>
</head>
<body>
<?php
        include '../view/navbar.php';
    ?>
    
<div align="center">
<h1>Bus Details</h1>
</div>
<table align="center">
    <tr>
    <th></th><th></th><th></th><th></th><th></th><th></th>
    <th>Bus Name</th>
    
    <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
    <th>Seat</th>
  
    <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
    <th>Bus Details</th>
    </tr>
<?php

include '../model/database.php';

$sql="select * from route";
$query=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_assoc($query)) {
    $firstname=$row['firstname'];
    $email=$row['email'];
    $feedback=$row['feedback'];
?>
 <tr>
        <th></th><th></th><th></th><th></th><th></th><th></th>
        <td><?php echo $firstname;?></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td><?php echo $email;?></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td><?php echo $feedback;?></td>
        
    </tr>
    <?php }
    ?>
    
</table>
<?php
        include '../view/footer.php';
    ?>
</body>
</html>

