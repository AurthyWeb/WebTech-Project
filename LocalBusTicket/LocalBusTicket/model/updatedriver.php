<?php
 //prepared statement
 $stmt = $conn->prepare("UPDATE driver SET firstname=?,lastname=? WHERE email=?");

 $stmt->bind_param("sss", $firstname,$lastname, $email);
             
 $stmt->execute(); 


?>