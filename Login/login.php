<?php
$conn = new mysqli('sql206.infinityfree.com','if0_35095105','0rvgAHq7Vyxq2J','if0_35095105_treasurehunt');

if($conn->connect_error){
    die('Connection Failed:' . $conn->connect_error);
}

$name = $_POST['name'];
$password = $_POST['password'];

$query5 = "SELECT * FROM students WHERE name = '$name'";
$result5 = $conn->query($query5);
$row5 = $result5->fetch_assoc();

if($name == $row5["name"] && $password == $row5["password"]){
    $url = "http://enginerds2k23treasurehunt.000.pe/Quiz/MainApp/app.php?data=" . urlencode($name);
    echo "<a href='$url'>Click here to play the quiz</a>";
}
else{
    if($name == $row5["name"] && $password != $row5["password"])
        echo "<h3>Password is wrong</h3>";
    else if($name != $row5["name"]){
        echo "<h3>You are not registered.
        Register First.</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure LogIn</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('treasurer.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: larger;
            font-weight: 600;
        }
        h3{
            color: wheat;
            position: absolute;
            -webkit-text-stroke: 1px black;
        }
    </style>
</head>
<body>
    
</body>
</html>
