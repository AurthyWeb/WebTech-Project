<!-- *********Start php********** -->
<?php

session_start();


include '../model/database.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $flag = true;
        // general information
        $firstname = sanitize($_POST['firstname']);
        $lastname = sanitize($_POST['lastname']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $confirmpassword = sanitize($_POST['confirmpassword']);

        $errorfirstname=$errorlastname=$erroremail=$errorpassword=$errorconfirmpassword=$errorvalidmail=$errormatchedpassword=" ";
        // if input form is empty then show some specific error 
        if(empty($firstname)){
            $errorfirstname="Please fill up the form";
            $flag = false;
        }

        if(empty($lastname)){
            $errorlastname="Please fill up the form";
            $flag=false;
        }
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
        if(empty($confirmpassword)){
            $errorconfirmpassword="Please fill up the form";
            $flag = false;
        }
    
        if($flag === true){
            if(!empty($firstname) && !empty($lastname) && !empty($email)&& !empty($password)&& !empty($confirmpassword)){
                if($password===$confirmpassword){

                   
                    $sql = "insert into admin(firstname,lastname, email, password) values('$firstname', '$lastname','$email','$password')";
                
                    // To execute this query      
                    $result = mysqli_query($conn,$sql);
                    // this method will allow us to execute this query
                    if($result){
                       echo "Register successfully";
                       //header('location:./login.php');
                       

                       //Prepared statement 
                    //    $stmt = $conn->prepare("INSERT INTO driver (firstname,lastname,email, password) VALUES (?, ?, ?,?)");
                    //    $stmt->bind_param("ssss", $firstname,$lastname, $email, $password);
                       
                    //        $firstname = $firstname;
                    //        $lastname=$lastname;
                    //        $email = $email;
                    //       $password=$password;
                        
                    //        $stmt->execute();

                    //include '../model/insertdriver.php';

                           header('location:../view/adminLogin.php');

                    }
                    else{
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                else{
                    $errormatchedpassword="Password didn't matched.";
                    //echo "Password didn't matched.";
                }
            } 
        }}
    else{
        //echo "404 Error !";
    }

    function sanitize($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>




<!--*********Form part************** -->
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
    
    <form name="myForm" action="adminRegister.php" onsubmit="return isValidForm(this)" method="post" novalidate >
    <div align="center">
   

    <h1>Registration</h1>
    </div>    

    <table align="center">
        <tr>
            <td>
                
                <fieldset>
                    <legend>Admin Registration Form: </legend>
                    <!-- ---------------------------------------- -->
                    <form name="myForm" action="adminRegister.php" onsubmit="return isValidForm(this)" method="post" novalidate>
                        <table>
                        
                            <tr>
                                <td>
                                    <label for="firstname">First Name</label>
                        
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="text" id="firstname" name="firstname" value="<?php if(isset($_POST['submit'])){echo $firstname;}    ?>"
                                        placeholder="Enter your first name here...  "><br>
                                        <span id="error-fname" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $errorfirstname;} ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="lastname">Last Name</label>
                                  
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="text" id="lastname" name="lastname" value="<?php if(isset($_POST['submit'])){echo $lastname;} ?>"
                                        placeholder="Enter your first name here...  "><br>
                                        <span id="error-lname" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $errorlastname;} ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="email">Email</label>
                             
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="email" id="email" name="email" value="<?php if(isset($_POST['submit'])){echo $email;} ?>"
                                        placeholder="Enter your email...  "><br> 
                                        <span id="error-email" style="color:red"></span><br>  
                                        <?php if(isset($_POST['submit'])){echo $erroremail; echo  $errorvalidmail;} ?>                        
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="password">Password</label>
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="password" id="password" name="password" value=""
                                        placeholder="Enter your password...  "><br>
                                        <span id="error-password" style="color:red"></span><br>
                                        <?php if(isset($_POST['submit'])){echo $errorpassword;} ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                <label for="confirmpassword">Confirm Password</label>
                             
                                </td>
                                <td>:</td>
                                <td>
                                    <input type="password" id="confirmpassword" name="confirmpassword" value=""
                                        placeholder="Enter confirm password...  "><br>
                                        <span id="error-confirm" style="color:red"></span>
                                        <?php if(isset($_POST['submit'])){echo $errorconfirmpassword;echo $errormatchedpassword;} ?>
                                </td>
                            </tr>
                            
                            <tr align="center">
                                <td></td>
                                <td></td>
                                <td><input style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:5px;margin-top:20px;" type="submit" name="submit" value="Register">
                                </td>
                            </tr>

                        </table>
                    </form>

                </fieldset>
            </td>
        </tr>

    </table>
    
    </form>
        
    <div align="center">
    <h4>Already Have an Accout?<a style="color:red;text-decoration:none;text-transform:uppercase;font-weight:bold;" href="../view/adminLogin.php">Login here</a></h4>
   

    </div>  
    <?php include "../view/footer.php"; 
    ?>  

<script src="../view/registerjavascript.js"></script>  
    
</body>
</html>