<?php 

    include 'conn.php'; 
    include 'login.php'; 
    
    $matchid = $_POST['matchid'];
    
    $start_game = "update Matches set status = 'Live', result = 'Pending' where id = $matchid";
    $conn->query($start_game);

    header("Location: ../admin/game.php?gameid=$matchid&user=$userid");
    die('Error connecting to MySQL server.');
?>