<?php
    // $code = $_POST['c1'];

    $conn = new mysqli('sql206.infinityfree.com','if0_35095105','0rvgAHq7Vyxq2J','if0_35095105_treasurehunt');

    if($conn->connect_error){
        die('Connection Failed:' . $conn->connect_error);
    }

if (isset($_GET['data'])) {
    $receivedData = urldecode($_GET['data']);
    // echo $receivedData;
}
// echo "urlencode($recievedData";
// $variable = $receivedData;
// $url = "http://localhost/Quiz/MainApp/check.php?data=" . urlencode($variable);


    $query3 = "SELECT * FROM students WHERE name = '$receivedData'";
    $result3 = $conn->query($query3);
    $row3 = $result3->fetch_assoc();
    $i = $row3["question"];


    if($i<=6){
        $query2 = "SELECT * FROM question";
        $result2 = $conn->query($query2);
        $row2 = $result2->fetch_assoc();
        $clue = $row2["q".$i];
    }

    // else{
    //     echo 'Successful';
    // }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="round.css">
    <title>Hunt Round</title>
    <style>
        /* .pretty{
            font-weight:900;
        } */
        .size{
            font-size:0.9rem;
        }
        .hide{
            visibility:hidden;
        }
        input{
            margin:5px;
        }
        label{
            width:58%;
        }
        a{
            color:black;
            text-decoration:none;
        }
        .number{
            color: wheat;
            position: absolute;
            -webkit-text-stroke: 1px black;
            top:40px;
            font-size:18px;
            left:60%;
            z-index: 0;
        }
        .form{
            z-index: 1;
        }
        
    </style>
</head>
<body>
    <?php
    // $encode = urlencode($receivedData);
    $url = "http://enginerds2k23treasurehunt.000.pe/Quiz/MainApp/check.php?data=" . urlencode($receivedData);
    ?>
            <?php
                if($i==5){
                    echo '<div class="number">401</div>';
                }
            ?>
    <form action=<?php echo $url;  ?> 
    method="post" class="one" id="r1">
        <?php
            if($i<=6){
                echo '<h1>Round'.$i.'</h1>';
                if($i==1){
                    echo '<img src="QR.jpg" alt="" srcset="" height="100px" width="100px">';
                }
                else if($i==3){
                    echo '<a href="https://twitter.com/CaptJonesDavy">Someone is waiting for you.Click Me</a>';
                }
                else if($i==4){
                    echo '<a href="https://drive.google.com/drive/folders/1mD9zY8spHnnDbOcqeioRK8ofzh1zle7y?usp=drive_link">Take the First letter of the guessed word. Click Me.</a>';
                }
                else if($i==6){
                    echo '<a href="https://www.instagram.com/justanotherrandomtreasurehunt">Abh isme Click Karle</a>';
                }
                else{
                    echo '<label for="">'.$clue.'</label>';
                }
                echo '<input type="text" name="codes" required>';
                echo '<input type="text" class="hide" name="variable1" value="$recievedData">';
                echo '<button>Continue</button>';
            }
            else{
                echo '<b><h1 class="pretty size">Congratulations you are one step away from the treasure.</h1></b>';
                echo '<h1 class="size">Along your journey, you may remember finding some numbers beginning with p or s.</h1>';
                echo '<h1 class="size">Now return to where you began and find those pillars use them in correct sequence where p is pillar and s is side.</h1>';
                echo '<h1 class="size">Give Us the code so obtained and the treasure might be yours.</h1>';
            }
        ?>
    </form>
    <script src="round.js"></script>
</body>
</html>
