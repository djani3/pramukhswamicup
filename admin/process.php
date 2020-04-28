<?php 

    include 'conn.php'; 
    
    $score1 = (int)$_POST['score1'];
    $wickets1 = (int)$_POST['wickets1'];
    $overs1 = $_POST['overs1'];

    $score2 = (int)$_POST['score2'];
    $wickets2 = (int)$_POST['wickets2'];
    $overs2 = $_POST['overs2'];

    $gameid = $_POST['gameid'];


    $update_game = "update Matches set score1 = $score1, wickets1 = $wickets1, overs1 = $overs1, score2 = $score2, wickets2 = $wickets2, overs2 = $overs2 where id = $gameid";
    $conn->query($update_game);

    die('Error connecting to MySQL server.');
?>