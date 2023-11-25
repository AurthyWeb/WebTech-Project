<?php
include '../model/database.php';

$stmt = $conn->prepare("INSERT INTO driver (firstname,lastname,email, password) VALUES (?, ?, ?,?,?)");
            $stmt->bind_param("ssss", $firstname,$lastname, $email, $password);
            
                $firstname = $firstname;
                $lastname=$lastname;
                $email = $email;
               $password=$password;
               
                $stmt->execute();
?>