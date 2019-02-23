<?php 

    // Connecting to database
    require 'dbconnection.sc.php';

    if( isset($_POST['show']) ){

        $slot = $_POST['slot'];
        if($slot == 'slot_01'){$s='Slot 01';$i=1;}
        elseif($slot == 'slot_02'){$s='Slot 02';$i=2;}
        elseif($slot == 'slot_03'){$s='Slot 03';$i=3;}
        elseif($slot == 'slot_04'){$s='Slot 04';$i=4;}
        elseif($slot == 'sel_all'){$s='All Registrations';$i=0;}

        if( $slot == 'sel_all' ){

            $sql = 'SELECT * FROM registrations';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            if( empty($result) ){
                session_start();
                session_unset();
                session_destroy();
                session_start();
                $_SESSION['success'] = 'Nothing';
                Header('Location: ../admin.php?&error=nothingFound&i='.$i.'');
                exit();
            }else{
                session_start();
                $_SESSION['result'] = $result ;
                $_SESSION['title'] = $s;
                $_SESSION['i'] = $i ;
                Header('Location: ../admin.php');
            }
        }else{

            $sql = 'SELECT * FROM registrations WHERE slot = :slot ';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':slot',$slot);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            if( empty($result) ){
                session_start();
                session_unset();
                session_destroy();
                session_start();
                $_SESSION['i'] = $i ;
                $_SESSION['success'] = 'Nothing';
                Header('Location: ../admin.php?error=nothingFound&i='.$i.'');
                exit();
            }else{
                session_start();
                $_SESSION['result'] = $result ;
                $_SESSION['title'] = $s ;
                $_SESSION['i'] = $i ;
                Header('Location: ../admin.php');
            }
        }
    }
    elseif ( isset( $_POST['searchBtn'] ) ) {
        $_id = $_POST['searchInput'];

        $sql = "SELECT * FROM registrations WHERE s_id = :_id ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':_id',$_id);
        $stmt -> execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if( empty($result) ){
            session_start();
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['success'] = 'Nothing';
            Header('Location: ../admin.php?&error=nothingFound&i='.$i.'');
            exit();
        }else{
            session_start();
            $_SESSION['title'] = 'Student Found' ;
            $_SESSION['result'] = $result ;
            Header('Location: ../admin.php');
        }

    }

    else{

        Header('Location: ../admin.php');
        exit();
    }