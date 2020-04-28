<?php

if (isset($_GET['user'])){
    $userid = $_GET['user'];
    $userid = base64_decode($userid);

    if ($userid == "7283"){
        $userid = base64_encode($userid);
        $userid = $_GET['user'];
    }
    else {
        echo "<script>window.location.href = '../?success=-1';</script>";
    }
    
}
else{
    echo "<script>window.location.href = '../?success=-1';</script>";
}

?>