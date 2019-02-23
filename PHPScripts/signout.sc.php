<?php 

    session_start();
    session_unset();
    session_destroy();

    Header('Location: ../signin.php?mess=Signed%Out');
    exit();