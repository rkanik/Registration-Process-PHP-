<?php
    ob_start();
    require 'dbconnection.sc.php';

    if( isset($_POST['cancelreg'])){

        session_start();

        $sql='DELETE FROM registrations WHERE s_id = :s_id AND email=:email';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':s_id',$_SESSION['_id']);
        $stmt->bindParam(':email',$_SESSION['email']);
        $stmt->execute();

        session_unset();
        session_destroy();
        Header('Location: ../index.php?succsess=Canceled');
    }
    elseif ( isset($_POST['update_slot']) ) {

        session_start();

        $sql = "SELECT count(slot) as count from registrations where slot = :slot";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':slot',$_POST['slot']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        (int)$reg = $result->count;
        if ( $reg > 7 ){
            Header('Location: ../student.php?error=SlotNotAvailable');
            exit();
        }

        $sql = 'UPDATE registrations SET slot = :slot where s_id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$_SESSION['_id']);
        $stmt->bindParam(':slot',$_POST['slot']);
        $stmt->execute();

        $sql = "SELECT * FROM registrations WHERE s_id=:s_id && email=:email";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':s_id' , $_SESSION['_id'] );
        $stmt->bindParam(':email' , $_SESSION['email'] );

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if( !empty($result) ){

            session_start();
            $_SESSION['firstName'] = $result->firstName ;
            $_SESSION['lastName'] = $result->lastName ;
            $_SESSION['email'] = $result->email ;
            $_SESSION['_id'] = $result->s_id ;
            $_SESSION['slotName'] = $result->slot ;

            $slot = $result->slot ;
            if( $slot == "slot_01"){
                $_SESSION['slotTime'] = "08:00 - 10:00" ;
            }
            elseif( $slot == "slot_02"){
                $_SESSION['slotTime'] = "10:00 - 12:00" ;
            }
            elseif( $slot == "slot_03"){
                $_SESSION['slotTime'] = "12:00 - 02:00" ;
            }
            elseif( $slot == "slot_04"){
                $_SESSION['slotTime'] = "02:00 - 04:00" ;
            }

            Header('Location: ../student.php?succsess=UpdateSuccsess');
        }

    }