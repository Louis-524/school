<?php
    session_start(true);
    if(($_SESSION['mem_id']) == null){
        $url = "../login/login_home.php";
        header("Location:$url");


    }

?>

