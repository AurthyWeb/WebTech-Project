<!-- *********Start php********** -->
<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('location: ../controler/login.php');
}

include '../model/database.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $flag = true;
        // general information
        $email = $_POST['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];

        $erroremail=$erroroldpassword=$errornewpassword=$errorconfirmpassword=$errormatchedpassword=$errorvalidmail=" ";
        // if input form is empty then show some specific error 
        if(empty($email)){
            $erroremail="Please fill up the form";
            $flag = false;
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errorvalidmail="This is not correct email format..";
                $flag = false;
            }
        }

        if(empty($oldpassword)){
            $erroroldpassword="Please fill up the form";
            $flag=false;
        }
        if(empty($newpassword)){
            $errornewpassword="Please fill up the form";
            $flag = false;
        }

        if(empty($confirmpassword)){
            $errorconfirmpassword="Please fill up the form";
            $flag = false;
        }
        
    
        if($flag === true){
            if(!empty($email) && !empty($oldpassword) && !empty($newpassword)&& !empty($confirmpassword)){
                if($newpassword===$confirmpassword){

                    /*
                    $sql = "UPDATE driver SET password='$newpassword' WHERE email='$email' ";

                    $result=mysqli_query($conn, $sql);
                    if ($result) {
                        //echo $newpassword;
                    echo "Record updated successfully";
                    } else {
                    echo "Error updating record: " . mysqli_error($conn);
                    }
                    }
                    else{
                        $errormatchedpassword="Password didn't matched.";
                        //echo "Password didn't matched.";
                        
                    }

*/

                //prepared statement
                $stmt = $conn->prepare("UPDATE driver SET password=? WHERE email=?");

                $stmt->bind_param("ss",$newpassword,$email);
                            
                $stmt->execute();



                }
                
            } }
        
    else{
        //echo "404 Error !";
    }

    function sanitize($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
            <h1>Login Page</h1>
                <br>
                <br>
                <br>
                <fieldset>
                    <legend>Change Password </legend>
                    <!-- ---------------------------------------- -->
                    <form action="changepassword.php" method="post" novalidate onsubmit="return Valid(this)">
                        <table>

                            <tr>
                                <td>
                                    <label for="email">Email</label>
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="email" id="email" name="email" value="<?php if(isset($_POST['submit'])){echo $email;} ?>"
                                        placeholder="Please enter your email...  "><br>
                                        <span id="email_msgg" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $erroremail; echo $errorvalidmail;} ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="oldpassword">Old Password</label>
                                    
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="oldpassword" id="oldpassword" name="oldpassword" value=""
                                        placeholder="Please enter your password...  "><br>
                                        <span id="password_old" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $erroroldpassword;} ?>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    <label for="newpassword">New Password</label>
                                    
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="newpassword" id="newpassword" name="newpassword" value=""
                                        placeholder="Please enter your password...  "><br>
                                        <span id="password_new" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $errornewpassword;} ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="confirmpassword">Confirm Password</label>
                                    
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="confirmpassword" id="confirmpassword" name="confirmpassword" value=""
                                        placeholder="Please enter your password...  "><br>
                                        <span id="password_confirm" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $errorconfirmpassword;echo $errormatchedpassword;} ?>
                                </td>
                            </tr>
                           
                           
                            <tr align="center">
                                
                                <td></td>
                                <td></td> 
                                <br>
                                <td><input style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:10%;margin-top:20px;" type="submit" name="submit" value="Change Password" ></td>   
                            </tr>
                          

                            <tr>
                                <td></td>
                                <td></td> 
                                <td> <h4>Back to <a style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:10%;margin-top:20px;text-decoration:none;  " href="../controler/login.php">Login page</a></h4></td>   
                            </tr>

                      

                        </table>
                    </form>

                </fieldset>
            </td>
        </tr>

    </table>

    <script src="../view/changejs.js"></script>

</body>

</html>