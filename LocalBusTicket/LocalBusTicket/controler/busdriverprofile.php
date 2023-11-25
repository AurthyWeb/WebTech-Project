<?php
session_start();

//validation
if(!isset($_SESSION['email'])){
    header('location: ../controler/login.php');
}


include '../model/database.php';


    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $flag = true;
        // general information
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];


        //$errorfirstname=$errorlastname=$erroremail=errorvalidmail="";
        // if input form is empty then show some specific error
        if(empty($firstname)){
            $errorfirstname="Please fill up the form";
            $flag=false;
        }
        if(empty($lastname)){
            $errorlastname="Please fill up the form";
            $flag = false;
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
    
        if($flag === true){
            if(isset($_POST['updatedata'])){
            if(!empty($firstname) && !empty($lastname) && !empty($email)){
               /*
                    $sql = "UPDATE admin SET email='$email',lastname='$lastname',firstname='$firstname' WHERE Username='$Username' ";

                    $result=mysqli_query($conn, $sql);
                    if ($result) {
                        echo $email."<br>";
                    echo "Record updated successfully";
                */
                   //prepared statement
                    include '../model/updatdriver.php';

                    header('location:../controler/login.php');
                    } else {
                    echo "Error updating record: ". mysqli_error($conn);
                    }
                    
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
            <h1>Bus Driver Profile</h1>
                <br>
                <br>
                <br>
                <fieldset>
                    <legend>Admin Profile: </legend>
                    <!-- ---------------------------------------- -->
                    <form action="busdriverprofile.php" method="post" novalidate>
                        <table>


                            <tr>
                                <td>
                                </td>
                                <td>
                                   <img src="../images/driver.jpeg" alt="Aurthy" height="200px" width="200px">
                                </td>
                                <td>
                                </td>
                            </tr>

                            


                            <tr>
                                <td>
                                  <h4> First Name:</h4> 
                                </td>
                                
                                <td>
                                    <input type="text" name="firstname" id="" value="<?php echo $_SESSION['firstname']; if(isset($_POST['updatedata'])){ echo $firstname;}?>">
                                    
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Last Name:</h4>
                                    
                                </td>
                               
                                <td>
                               
                                <input type="text" name="lastname" value=" <?php echo $_SESSION['lastname']; if(isset($_POST['updatedata'])){echo $firstname;}?>">
                                </td>
                            </tr>

                         
                            
                            <tr>
                                <td>
                                    <h4>Email:</h4>
                                </td>
                               
                                <td>
                                
                                <input type="email" name="email" value="<?php echo $_SESSION['email'];?>">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                   
                                </td>
                               
                                <td>
                                <input style="background:red;padding:8px 5px;border:1px solid red;border-radius:10%;margin-top:20px;border:1px solid black;color:white;" type="submit" name="updatedata" value="Update Data">
                                </td>
                                <td>
                                   
                                   </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td><button style="background:red;padding:8px 5px;border:1px solid red;border-radius:10%;margin-top:20px;border:1px solid black;"> <a  style="background:red;padding:8px 5px;border:1px solid red;border-radius:5%;color:white;text-decoration:none;" href="./changepassword.php">Change Password</a></button></td>
                                <br><br>

                        </tr>

                       


                            <tr>
                              
                                <td>
                                <h3>Click here to <a style="color:red;text-decoration:none;text-transform:uppercase;font-weight:bold;" href="./logout.php">Logout</a></h3>
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td><button style="background:red;padding:8px 5px;border:1px solid red;border-radius:5px;"> <a style="color:white;text-decoration:none;text-transform:uppercase;font-weight:bold;" href="../view/dashboard.php">Dashboard</a></button></td>
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