<?php
    require 'dbconnection.sc.php';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
