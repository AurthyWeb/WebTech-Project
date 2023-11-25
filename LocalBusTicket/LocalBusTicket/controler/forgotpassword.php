<?php

session_start();

include '../model/database.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $flag = true;
    
    // Account Information 
    $to_email = $_POST['email'];
    

    
    $erroremail=$errorvalidmail=" ";
    
    if(empty($to_email)){
        $erroremail="Please fill up the form";
        $flag = false;
    }else{
        if(!filter_var($to_email, FILTER_VALIDATE_EMAIL)){
            $errorvalidmail="This is not correct email format..";
            $flag = false;
        }
    }
   
    if($flag === true){

        if(isset($to_email)){
            if(!empty($to_email)){

                /*
            $sql = "Select * from driver WHERE  email='$to_email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
*/

                //Prepared statement
                $sql = "SELECT * FROM driver where email=?";
                $stmt = $conn->prepare($sql); 
                $stmt->bind_param("s",$to_email);
                $stmt->execute();
                $result = $stmt->get_result();


            if($row = $result->fetch_assoc()>0){
                $recovery_password=$row['password'];
                $subject="Recovery password";
                $body="Your password is: $recovery_password";
                $headers="From:aurthyaurthy2000@gmail.com";

                if(mail($to_email,$subject,$body,$headers)){
                    echo "Your password successfully send to ".$to_email;
                }else{
                    echo "Failed to send the password";
                }
            }
            
        }
        
    }
    
}
}

?>




<!-- **************Form part************ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/index.css">
</head>

<body>
    <?php
        include '../view/navbar.php';
    ?>
    
    <table align="center">
     
        <tr>
            <td>
            <h1>Forgot Password</h1>
                <br>
                <br>
                <br>
                <fieldset>
                    <legend>Forgot Password </legend>
                    <!-- ---------------------------------------- -->
                    <form action="forgotpassword.php" method="post" novalidate>
                        <table>

                            <tr>
                                <td>
                                    <label for="email">Provide Valid Email: </label>
                                </td>
                                
                                <td>
                                    <input type="email" id="email" name="email" value="<?php if(isset($_POST['submit'])){echo $to_email;} ?>"
                                        placeholder="Please enter your email...  "><br>
                                    <?php if(isset($_POST['submit'])){echo $erroremail; echo $errorvalidmail;} ?>
                                        
                                    
                                </td>
                            
                                
                            <tr align="center">
                                
                                <td></td>
                                
                                <td><input style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:10%;margin-top:20px;" type="submit" name="submit" value="Recover Password" ><br></td>
                                <td></td> 
                                
                                   
                            </tr>

                           

                            <tr>
                                <td></td>
                                <td> <h4>Back to <a style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:10%;margin-top:20px;" href="../controler/login.php">Login page</a></h4></td>
                                <br><br>

                        </tr>
                        
                        </table>
                    </form>

                </fieldset>
            </td>
        </tr>

    </table>
</body>

</html>