<?php 

    include 'conn.php'; 
    include 'login.php'; 
    
    $matchInfo = $_POST['matchinfo'];
    $team1 = (int)$_POST['team1'];
    $team2 = (int)$_POST['team2'];


    $create_game = "insert into Matches (match_info, team1, team2, status,score1,wickets1,overs1,score2,wickets2,overs2,result) VALUES ('$matchInfo', $team1, $team2, 'Live', 0,0,'0.0',0,0,'0.0','Pending')";
    $conn->query($create_game);
    
    $get_id = "select * FROM Matches ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($get_id);

    if (($result->num_rows) > 0){
        while ($row = $result->fetch_assoc()){
            $matchid = $row['id'];
        }
    }
    
    
    header("Location: ../admin/game.php?gameid=$matchid&user=$userid");
    die('Error connecting to MySQL server.');
?>