<?php 

    include 'conn.php'; 

    if (isset($_GET['success'])){
        echo "<script>showAdmin()</script>";
    }

    $liveScores = "SELECT * from Matches where status = 'Live'";
    $result = $conn->query($liveScores);
    if (($result->num_rows) > 0){
        while ($row = $result->fetch_assoc()){
            $matchInfo = $row['match_info'];
            $team1_num = $row['team1'];
            $team2_num = $row['team2'];
            
            $score1 = $row['score1'];
            $wickets1 = $row['wickets1'];
            $overs1 = $row['overs1'];
            
            $score2 = $row['score2'];
            $wickets2 = $row['wickets2'];
            $overs2 = $row['overs2'];
            
            
            $get_team1 = "SELECT * FROM Teams where id = '$team1_num'";
            $get_team2 = "SELECT * FROM Teams where id = '$team2_num'";
            $team1 = $conn->query($get_team1);
            $team2 = $conn->query($get_team2);
            if (($team1->num_rows) > 0){
                while ($row = $team1->fetch_assoc()){
                    $team1_name = $row['name'];
                    $team1_color = $row['color'];
                }
            }
            if (($team2->num_rows) > 0){
                while ($row = $team2->fetch_assoc()){
                    $team2_name = $row['name'];
                    $team2_color = $row['color'];
                }
            }
            
            
            
            $team1_char = substr($team1_name, 0, 1);
            $team2_char = substr($team2_name, 0, 1);
            
            $diff = ($score1 - $score2)+1;
            $arr = explode(".",$overs2);
            $ballsleft = 12 - $arr[0];
            if ($arr[1] != 0){
                $ballsleft = (6-$arr[1]) + (6*($ballsleft-1));
            }
            else {
                $ballsleft =  (6*$ballsleft);
            }
            if ($diff < 0){
                $diff = 0;
            }
            echo "<p class='matchInfo'>$matchInfo</p>
                <div class='match-cont'>
                    <div class='team-cont'>
                        <div>
                            <span style='background:$team1_color;'>$team1_char</span>
                            <p>$team1_name</p>
                            <p class='score'>$score1/$wickets1 ($overs1)</p>
                        </div>
                        <div>
                            <span style='background:$team2_color;'>$team2_char</span>
                            <p>$team2_name</p>
                            <p class='score'>$score2/$wickets2 ($overs2)</p>
                        </div>
                    </div>
                    
                </div><br><br>";
        }
    }else{
        echo"No games to show.<br><br>";
    }
?>
<!--
<div class='results'>
    $team2_name needs $diff runs in $ballsleft balls
</div>-->
