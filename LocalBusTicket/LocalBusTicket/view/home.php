<?php
    session_start();
   

    include '../model/database.php';

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $flag = true;
            
        
            if($flag === true){
                
            }
        }else{
           // echo "404 Error !";
        }

        function sanitize($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

<!-- ********************** -->

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
    <div align="center">
        <!--navbar section start here -->
        
        <?php
       
        include '../view/navbar.php';
    ?>
        <!--navbar section end here -->
    </div>
    <table align="center">
        <tr>
            <td>
               
            <img src="../images/bus.jpg" alt="" height="200px" width="200px">
            </td>
            <td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;

                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
                <!-- Welcoming Text And Book Now Button -->
                <h1>Have A NICE TRIP WITH US !</h1>
                <button>

                
                    
                
            </td>
        </tr>
        <tr>
            <td>
                <h3>Features</h3>
            </td>
        </tr>



    </table>
    <!--Feature section start here -->
    <table align="center">
        <tr>
            <td>
                <h5>Easy Money Return Policy</h5>
            </td>
            <td>
                <h5>Convenient Ticking Booking Process</h5>
            </td>
        </tr>
        <tr>
            <td>
                <h5>Emergency Balance </h5>
            </td>
            <td>
                <h5>Carry Luggage Easily</h5>
            </td>
        </tr>
        <tr>
            <td>
                <hr><!---------------------------------------------------------------->
            </td>
            <td>
                <hr>
            </td>

        </tr>
    </table>
    <!--Feature section end here -->


    <!-- Trending Trip Section Starts Here  -->

    <table align="center">
        <tr>
            <td>
                <h3>Trending Trip</h3>
            </td>
        </tr>

        <tr>
            <td>

            <img src="../images/bus.jpg" alt="" height="200px" width="200px">
            </td>
            <td>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>

                <h3>Dhaka to Rajshahi</h3>
                <h6>Next level Poribohon</h6>
                <!-- <button> <a href="../../passenger/confirmBooking/confirmBooking.php">Book Now</a> </button> -->
            </td>
        </tr>

        <tr>
            <td>
                <h3>Dhaka to Rajshahi</h3>
                <h6>Next level Poribohon</h6>
                <!-- <button><a href="../../passenger/confirmBooking/confirmBooking.php">Book Now</a></button> -->
            </td>
            <td>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td>
            <img src="../images/bus.jpg" alt="" height="200px" width="200px">
            </td>
        </tr>

    </table>

    <?php
    include '../view/footer.php';
    ?>

</body>

</html>