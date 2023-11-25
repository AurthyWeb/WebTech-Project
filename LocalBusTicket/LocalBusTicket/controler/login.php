


<!-- *****Start php***** -->
<?php

session_start();
include '../model/database.php';

if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
    $id=$_COOKIE['email'];
    $pass=$_COOKIE['password'];
}else {
    $id="";
    $pass="";
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $flag = true;
    
    // Account Information 
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    
    $erroremail=$errorvalidmail=$errorpassword=" ";
    
    if(empty($email)){
        $erroremail="Please fill up the form";
        $flag = false;
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorvalidmail="This is not correct email format..";
            $flag = false;
        }
    }
    
    if(empty($password)){
        $errorpassword="Please fill up the form";
        $flag = false;
    }

    if($flag === true){


        // Data base operation should be done here ..  
        $sql = "Select * from driver WHERE  email='$email' AND password='$password' ";
        // $email $password
        // we want to execute the query
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

            //Prepared statement
            // $sql = "SELECT * FROM driver where email=? AND password=?";
            // $stmt = $conn->prepare($sql); 
            // $stmt->bind_param("ss",$email,$password);
            // $stmt->execute();

            // $result = $stmt->get_result();
            // $row = $result->fetch_assoc();
            //include'../model/viewdriver.php';

        if($row > 0){
            //echo " we found a user ";
            $_SESSION["id"]= $row['id'];
            $_SESSION["firstname"]= $row['firstname']; // row theke data gula access kortesi 
            $_SESSION["lastname"]= $row['lastname']; // row theke data gula access kortesi 
            $_SESSION["email"]= $row['email']; // 'email' // eita hocche amar table er column field  
            $_SESSION["password"]= $row['password'];


            if(isset($_POST['remember'])){
                setcookie('email',$_POST['email'],time()+(60*60*24));
                setcookie('password',$_POST['password'],time()+(60*60*24));
            }
            else {
                    setcookie('email','',time()-(60*60*24));
                    setcookie('password','',time()-(60*60*24));  
            }

            // ekhon passenger Profile e niye jabo 
            //header('location:../../passengerProfile/subNavbar/personalInformation/personalInformation.php');
            //echo "Login successfully done";
            header('location:../controler/busdriverprofile.php');
            
        }else{
            echo "we don't found a user ";
        }
    }
}else{
    //echo "404 Error !";
}

function sanitize($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
            
                <fieldset>
                    <legend>Login Form: </legend>
                    <!-- ---------------------------------------- -->
                    <form name="myForm" action="login.php" onsubmit="return isValid(this)" method="post" novalidate  >
                        <table>
                            <tr>
                                <td>
                                    <label for="email">Email</label>
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="email" id="email" name="email" value="<?php echo $id; ?>"
                                        placeholder="Please enter your email...  "><br><br>
                                        <span id="email_msg" style="color:red"></span>
                                        <br>
                                        <?php if(isset($_POST['submit'])){echo $erroremail; echo $errorvalidmail;} ?>

                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Password</label>
                                    
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="password" id="password" name="password" value="<?php echo $pass;?>"
                                        placeholder="Please enter your password...  "><br>
                                        <span id="password_msg" style="color:red"></span>
                                        <br>
                                        <?php if(isset($_POST['submit'])){echo $errorpassword;} ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" name="remember">Remember Me</input></td>
                                <br>
                            </tr>
                            <tr align="center">
                                
                                <td></td>
                                <td></td>
                                <td><input style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:10%;margin-top:20px;cursor:poiinter;" type="submit" name="submit" value="Login" ></td> 
                                <td></td>
                                <td></td> 
                                <td></td>
                                <br>    
                            </tr>

                            <tr>
                                <!-- <td> </td> -->
                                <td></td>
                                <td></td>
                                <td><p>Don't have an account?<a style="color:red;text-decoration:none;text-transform:uppercase;font-weight:bold;" href="../controler/register.php">Register here</a></p></td>
                            </tr>

                           
                        <tr>
                                <td></td>
                                <td> <a style="color:red;text-decoration:none;text-transform:uppercase;font-weight:bold;" href="../controler/forgotpassword.php">Forgot Password?</a></td>

                        </tr>
                        </table>
                    </form>

                </fieldset>
            </td>
        </tr>

    </table>


    <?php
        include '../view/footer.php';
    ?>

<script src="../view/loginjavascript.js"></script>

</body>

</html>