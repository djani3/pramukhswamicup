<?php 

    include 'conn.php'; 
    if (isset($_GET['gameid'])){
        $gameid = $_GET['gameid'];
    }

    $match = "SELECT * from Matches where id = $gameid";
    $result = $conn->query($match);

    if (($result->num_rows) > 0){
        while ($row = $result->fetch_assoc()){
            $teamNo1 = $row['team1'];
            $teamNo2 = $row['team2'];
            
            $score1 = $row['score1'];
            $wickets1 = $row['wickets1'];
            $overs1 = $row['overs1'];
            $score2 = $row['score2'];
            $wickets2 = $row['wickets2'];
            $overs2 = $row['overs2'];
            
            $over1 = explode(".", $overs1);
            $over2 = explode(".", $overs2);
            
            echo "<script>
                    var gameid=$gameid,score1=$score1,wickets1=$wickets1,overs1=$over1[0],balls1=$over1[1],score2=$score2,wickets2=$wickets2,overs2=$over2[0],balls2=$over2[1];
                 </script>";
            
//            $court = $row['court'];
            $get_team1 = "SELECT * FROM Teams where id = '$teamNo1'";
            $get_team2 = "SELECT * FROM Teams where id = '$teamNo2'";
            $team1 = $conn->query($get_team1);
            $team2 = $conn->query($get_team2);
            
            if (($team1->num_rows) > 0){
                while ($row = $team1->fetch_assoc()){
                    $team1_name = $row['name'];
                }
            }
            if (($team2->num_rows) > 0){
                while ($row = $team2->fetch_assoc()){
                    $team2_name = $row['name'];
                }
            }
        }
    }
?>
