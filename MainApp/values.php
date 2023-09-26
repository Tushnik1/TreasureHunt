<?php
    // $code = $_POST['c1'];

    // $conn = new mysqli('localhost','root','','treasurehunt');
    // if($conn->connect_error){
    //     die('Connection Failed:' . $conn->connect_error);
    // }

    if (isset($_GET['data'])) {
        $receivedDat = $_GET['data'];
        // echo "Received data: " . urldecode($receivedData);
        $recievedData = urldecode($receivedDat);
    }






    header("Location: http://enginerds2k23treasurehunt.000.pe/Quiz/MainApp/app.php");
    exit();
?>