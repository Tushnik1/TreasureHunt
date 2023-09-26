<?php
    $conn = new mysqli('sql206.infinityfree.com','if0_35095105','0rvgAHq7Vyxq2J','if0_35095105_treasurehunt');

    if($conn->connect_error){
        die('Connection Failed:' . $conn->connect_error);
    }

    $receiveData = $_GET['data'];
    if (isset($_GET['data'])) {
        $receiveData = urldecode($_GET['data']);
        // echo $receivedData;
    }

    $query1 = "SELECT * FROM students WHERE name = '$receiveData'";
    $result1 = $conn->query($query1);
    $row1 = $result1->fetch_assoc();
    $round = $row1['question'];
    
    $codes = $_POST['codes'];    //getting from user input
    

    $query = "SELECT * FROM code";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    // if (!$result) {
    //     die("Query failed: " . $conn->error);
    // }

    if($row["c".$round]==$codes){
        $round+=1;
        $update = "UPDATE students SET question = '$round' WHERE name = '$receiveData'";
        $conn->query($update);

        echo "<h4 class='correct nt'>Yes code is correct</h4>";
    }
    else{
        echo "<h4 class='incorrect nt'>Try Again!!</h4>";
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            height:100vh;
            width:100vw;
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        a{
            margin:12px;
            padding: 8px 12px;
            border:none;
            border-radius:5px;
            font-size:large;
            font-weight:bold;
            background-color:black;
            color:white;
            text-decoration:none;
        }
        .nt{
            font-size:larger;
            text-shadow:2px 2px 5px;
            background-color:rgba(255,255,255,0.5);
            padding: 6px;
            border-radius:5px
        }
        .correct{
            color:green;
        }
        .incorrect{
            color:red;
        }
        h2{
            background-color:rgba(255,255,255,0.4);
            border-radius:5px;
            padding:8px;
        }
    </style>
    <title>Hunt Check</title>
</head>
<body>
    <?php
    $encoded = urlencode($receiveData);
    $url = "http://enginerds2k23treasurehunt.000.pe/Quiz/MainApp/app.php?data=" . urlencode($receiveData);
    ?>
    <?php
        if($round==1){
            echo '<h2>Remember Me:P1 S2</h2>';
        }
        else if($round==2){
            echo '<h2>Remember Me:P2 S4</h2>';
        }
        else if($round==3){
            echo '<h2>Remember Me:P3 S1</h2>';
        }
        else if($round==4){
            echo '<h2>Remember Me:P2 S2</h2>';
        }
        else if($round==5){
            echo '<h2>Remember Me:P4 S3</h2>';
        }
        else if($round==6){
            echo '<h2>Remember Me:P1 S4</h2>';
        }
    ?>
    <a href=<?php echo $url ?> >Move to quiz</a>
    <?php
    ?>
</body>
</html>