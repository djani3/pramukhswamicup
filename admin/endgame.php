<?php 

    include 'conn.php'; 
    if (isset($_GET['gameid'])){
        $gameid = $_GET['gameid'];
        $userid = $_GET['user'];
    }
    
    $result = $_POST['winner'];

    
    $end_game = "update Matches set status = 'Finished', result = '$result' where id = $gameid";
    $conn->query($end_game);


    header("Location: ../admin?user=$userid");
    die('Error connecting to MySQL server.');
?>