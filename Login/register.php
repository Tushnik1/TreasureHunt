<?php

$conn = new mysqli('sql206.infinityfree.com','if0_35095105','0rvgAHq7Vyxq2J','if0_35095105_treasurehunt');
    if($conn->connect_error){
        die('Connection Failed:' . $conn->connect_error);
    }
    // else{
    //     echo 'Successful';
    // }
    
    $name = $_POST['name'];
    $password = $_POST['password'];
    $question = 1;

    // $query7 = "SELECT * FROM students WHERE name = $name ";
    // $result7 = $conn->query($query7);
    // $row7 = $result7->fetch_assoc();
    // echo $row7["name"];

    $sql = "INSERT INTO `treasurehunt`.`students` (name, password, question) VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("ssi", $name, $password, $question);
    
    if ($stmt->execute()) {
        echo "<h1>You have successfully registered for your hidden hunt</h1>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TreasureHunt Register</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('treasure.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: larger;
        }
        h1{
            color: wheat;
            position: absolute;
            -webkit-text-stroke: 2px black;
        }
    </style>
</head>
<body>
    
</body>
</html>