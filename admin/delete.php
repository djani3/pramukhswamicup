<?php 

    include 'conn.php'; 
    include 'login.php'; 
    
    if (isset($_GET['gameid'])){
        $gameid = (int)$_GET['gameid'];
    }
    
    

    $delete_game = "delete from Matches where id = $gameid";
    $conn->query($delete_game);

    header("Location: ../admin/?user=$userid");
    die('Error connecting to MySQL server.');
?>