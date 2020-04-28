<?php

    $servername = "shareddb-g.hosting.stackcp.net";
    $username = "pramukhcup-3235642b";
    $password = "abcd@1234";
    $dbname = "pramukhcup-3235642b";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>