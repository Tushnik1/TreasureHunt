<?php

$conn = new mysqli('sql206.infinityfree.com','if0_35095105','0rvgAHq7Vyxq2J','if0_35095105_treasurehunt');
if($conn->connect_error){
    die('Connection Failed:' . $conn->connect_error);
}

$query6 = "SELECT * FROM students";
$result6 = mysqli_query($conn,$query6);
// $row6 = $result6->fetch_assoc($result6);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure Hunt Admin Portal</title>
    <style>
        body{
            height:100vh;
            width:100vw;
            display:flex;
            justify-content:center;
            align-items:start;
            font-size:large;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .table{
            margin-top:50px;
            border:1px solid black;
            border-radius:5px;
            /* height:80%; */
            width:80%;
        }
        td{
            padding:12px;
            /* height:50px; */
            border:1px solid black;
            border-radius:5px;
        }
        .right{
            text-align:right;
        }
        .head{
            background-color:black;
            color:white;
        }
        h2{
            position: absolute;
            top: -10px;
        }
    </style>
</head>
<body>
    <h2>List of Participants and respective rounds</h2>
        <table class="table">
            <tr>
                <td class="head">User Name</td>
                <td class="head">Current Round</td>
            </tr>
            <tr>
                <?php

                    while($row6 = mysqli_fetch_assoc($result6)){

                ?>
                        <td><?php echo $row6["name"]; ?></td>
                        <td class="right"><?php echo $row6["question"]; ?></td>
                    </tr>
                <?php
                    }

                ?>
        </table>
                
    </body>
</html>