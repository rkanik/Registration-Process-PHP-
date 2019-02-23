<?php

    $host =  'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'slotmanagement';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    }
    catch( Exception $e ){
        exit();
    }
