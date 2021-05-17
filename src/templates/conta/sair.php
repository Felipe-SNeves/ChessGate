<?php
    
    session_start();
   
    if ($_SESSION["logado"]) {
        $_SESSION["logado"] = false;
        session_unset();
        session_destroy ();
        session_write_close ();
        setcookie (session_name(),'',0,'/');
        session_regenerate_id (true);
        header ("location: ../home.php");
    }
    else
        header ("location: ../home.php");
?>