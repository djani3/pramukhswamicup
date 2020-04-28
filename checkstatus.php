<?php

if (isset($_GET['success'])){
    echo "<p id='adminmsg'>Access Restricted</p>
    <script>
        function showAdmin(){
            document.getElementById('adminmsg').style.display = 'block';
            setTimeout(function(){ document.getElementById('adminmsg').style.display = 'none'; }, 3000);               
        }
        showAdmin();
    </script>
    ";
}
if (isset($_GET['invalid'])){
    echo "<p id='adminmsg'>Invalid Password</p>
    <script>
        function showAdmin(){
            document.getElementById('adminmsg').style.display = 'block';
            setTimeout(function(){ document.getElementById('adminmsg').style.display = 'none'; }, 3000);               
        }
        showAdmin();
    </script>
    ";
}
?>