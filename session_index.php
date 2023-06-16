<?php 
        session_start();
        $ip = $_SERVER['REMOTE_ADDR'];
        $ipd = '::2';
        $ipu = '::3';
        $ipua = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['USER'] = $ip;
       
?>

