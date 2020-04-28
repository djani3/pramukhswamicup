<?php 

    include 'conn.php'; 

    $schedule = "SELECT * from Schedule";
    $result = $conn->query($schedule);
    echo "<table>
            <tr>
                <th>Match</th>
                <th>Team Names</th>
                <th>Court</th>
            </tr>";
    if (($result->num_rows) > 0){
        while ($row = $result->fetch_assoc()){
            $matchNum = $row['match_no'];
            $teamNo1 = $row['team1'];
            $teamNo2 = $row['team2'];
            $court = $row['court'];
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
            echo "<tr>
                    <td>$matchNum</td>
                    <td>$team1_name &nbsp;vs&nbsp; $team2_name</td>
                    <td>$court</td>
                </tr>";
        }
    }
    echo "</table>";
?>
