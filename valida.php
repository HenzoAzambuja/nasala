<?php

    session_start();

    if(!isset($_SESSION['nome']) || $_SESSION['nome'] == ' '){
        session_destroy();
        header("Location: login.php")
    }

?>