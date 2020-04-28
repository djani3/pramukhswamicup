<?php

    $userid = (int)$_POST['userid'];

    if ($userid == "7283") {
        $userid = base64_encode($userid);
        header("Location: ../admin/?user=$userid");
    }
    else {
        header("Location: ../?invalid=-1");
    }

?>