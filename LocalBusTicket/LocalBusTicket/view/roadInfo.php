<!-- *********Start php********** -->
<?php

session_start();
include '../model/database.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $flag = true;
        // general information
        $firstname = sanitize($_POST['firstname']);
        $email = sanitize($_POST['email']);
        $feedback=sanitize($_POST['feedback']);
        $errorfirstname=$erroremail=$errorvalidmail=$errorfeedback=" ";
        // if input form is empty then show some specific error 
        if(empty($firstname)){
            $errorfirstname="Please fill up the form";
            $flag = false;
        }

        if(empty($feedback)){
            $errorfeedback="Please fill up the form";
            $flag = false;
        }

        if(empty($email)){
            $erroremail="Please fill up the form";
            $flag = false;
        }

        if($flag === true){
        
        
            if(!empty($firstname) && !empty($email) && !empty($feedback)){
               

                            if (!isset($Error)) {
                               
                            /*
                            $sql = "insert into admin(firstname,lastname,Username, email, password) values('$firstname', '$lastname','$Username','$email','$password')";
                
                            // To execute this query      
                            $result = mysqli_query($conn,$sql);
                            // this method will allow us to execute this query
                            if($result){
                               echo "Register successfully";
                              // header('location:./login.php');
                            }
                            else{
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
*/



            $stmt = $conn->prepare("INSERT INTO route (firstname,email,feedback) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $firstname,$email,$feedback);
            
                $firstname = $firstname;
                $email = $email;  
                $feedback=$feedback;            
                $stmt->execute();

                echo "Successfully added";

                        }
                    
                       
        }
    }}else{
        //echo "404 Error !";
    }

    function sanitize($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<?php
if(isset($Error)){
foreach ($Error as $Error) {
    echo '&#x26A0'.$Error.'<br>';
}
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
<link rel="stylesheet" href="../view/style.css">


</head>
<body>

<?php
    include '../view/navbar.php';
?>

<form action="roadInfo.php" novalidate method="post" onsubmit="return isValidForm(this)" >
<div align="center">
<h1>Give Road Information</h1>
</div>    

<table align="center">
    <tr>
        <td>
            <br>
            <br>
            <br>
            <fieldset>
                <legend>Route Info: </legend>
                <!-- ---------------------------------------- -->
                <form action="roadInfo.php" novalidate method="post" onsubmit="return isValidForm(this)">
                    <table>
                    
                        <tr>
                            <td>
                                <label for="firstname">Bus Name:</label>
                    
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" id="firstname" name="firstname" value="<?php //if(isset($_POST['submit'])){echo $firstname;} ?>"
                                    placeholder="Enter your first name here...  "><br>
                                    <span id="error-fname" style="color:blue"></span><br><br>
                                    <?php if(isset($_POST['submit'])){echo $errorfirstname;} ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="email">Available Sit:</label>
                         
                            </td>
                            <td>:</td>
                            <td>
                                <input type="email" id="email" name="email" value="<?php if(isset($_POST['submit'])){echo $email;} ?>"
                                    placeholder="Enter your email...  "><br>   
                                    <span id="error-email" style="color:blue"></span><br><br>
                                    <?php if(isset($_POST['submit'])){echo $erroremail;} ?>                        
                            </td>
                        </tr>

                   
                        <tr>
                            <td>
                                <label for="feedback">Details Bus</label>
                         
                            </td>
                            <td>:</td>
                            <td>
                               <textarea name="feedback">Enter text here...</textarea>                    
                            </td>
                        </tr>

                        <tr align="center">
                            <td></td>
                            <td></td>
                            <td><input style="background-color:red;color:white;padding:8px 5px;text-transform:uppercase;border-radius:5px;margin-top:20px;" type="submit" name="submit" value="Submit">
                            </td>
                        </tr>

                        <tr align="center">
                            <td></td>
                            <td></td>
                            <td>
                            <h2>Go to Busdriver<a href="../controler/login.php">Login Page..</a></h2>
                            </td>
                        </tr>

                    </table>
                </form>

            </fieldset>
        </td>
    </tr>

</table>

</form>
       

<?php 
include '../view/footer.php';
?>

<!-- <script src="../view/registerjs.js"></script> -->


</body>
</html>