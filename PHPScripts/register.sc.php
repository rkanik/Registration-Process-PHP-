<?php

    // Connecting to database
    require 'dbconnection.sc.php';

    // Checking for form submission
    if( isset($_POST['submit']) ){

        // Getting the values entered by user
        // also trimming empty space
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $_id = trim($_POST['id_number']);
        $slot = $_POST['slot'];

        // Checking one of the field is empty
        if( empty($firstName) || empty($lastName) || empty($email) || empty($_id) ){
            Header("Location: ../register.php?error=Empty%Field&firstName=$firstName&lastName=$lastName&email=$email&id_number=$_id");
            exit();

        }
        // Checking for a valid email address
        elseif ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            Header("Location: ../register.php?error=Invalid%Email&firstName=$firstName&lastName=$lastName&id_number=$_id");
            exit();
        }
        // Checking if no slot is selected
        elseif ( $slot == "sel_slot") {
            Header("Location: ../register.php?error=Slot%Error&firstName=$firstName&lastName=$lastName&email=$email&id_number=$_id");
            exit();

        }else{

            $sql = "SELECT count(slot) as count from registrations where slot = :slot";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':slot' , $slot );
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if( $result->count > 7 ){
                Header("Location: ../register.php?error=SeatNotAvailable&firstName=$firstName&lastName=$lastName&email=$email&id_number=$_id");
                exit();
            }
            else{

                // Checking for duplicate registrations //
                $sql = "SELECT * FROM registrations WHERE s_id=:s_id OR email=:email";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':s_id' , $_id );
                $stmt->bindParam(':email' , $email );

                $stmt->execute();

                $result = $stmt->fetch(PDO::FETCH_OBJ);

                if( !empty($result) ){
                    Header("Location: ../register.php?error=Duplicate%Registration&firstName=$firstName&lastName=$lastName");
                    exit();
                }
                // Duplicate checking end //
                
                else{
                    
                    // Inserting data to the Database
                    $sql = "INSERT INTO registrations(firstName,lastname,email,s_id,slot)
                    VALUES(:fName,:lName,:email,:s_id,:slot)";

                    $stmt = $conn->prepare($sql);

                    $stmt->bindParam(':fName',$firstName );
                    $stmt->bindParam(':lName',$lastName );
                    $stmt->bindParam(':email',$email );
                    $stmt->bindParam(':s_id',$_id );
                    $stmt->bindParam(':slot',$slot );
                    $stmt->execute();
                    //exit();
                    //Registrations Successful
                    Header("Location: ../register.php?succsess=Registration%Successful");
                    exit();
                }
            }

            $stmt = null ;
        }

    }elseif( isset($_POST['update']) ){
        session_start();
        // Getting the values entered by user
        // also trimming empty space
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $_id = trim($_POST['id_number']);

        // Checking one of the field is empty
        if( empty($firstName) || empty($lastName) || empty($email) || empty($_id) ){
            Header("Location: ../register.php?mess=update&error=Empty%Field&firstName=$firstName&lastName=$lastName&email=$email&id_number=$_id");
            exit();

        }
        // Checking for a valid email address
        elseif ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            Header("Location: ../register.php?mess=update&error=Invalid%Email&firstName=$firstName&lastName=$lastName&id_number=$_id");
            exit();
        }
        else{
            $sql = 'UPDATE registrations SET firstName = :fName , lastName = :lName , email = :email , s_id = :_id WHERE s_id = :preID AND email = :preEmail';
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':fName',$firstName );
            $stmt->bindParam(':lName',$lastName );
            $stmt->bindParam(':email',$email );
            $stmt->bindParam(':_id',$_id );
            $stmt->bindParam(':preID',$_SESSION['_id'] );
            $stmt->bindParam(':preEmail',$_SESSION['email'] );
            $stmt->execute();

            $sql = "SELECT * FROM registrations WHERE s_id=:_id AND email=:email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':_id' , $_id );
            $stmt->bindParam(':email' , $email );
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if( !empty($result) ){
                session_start();
                $_SESSION['firstName'] = $result->firstName ;
                $_SESSION['lastName'] = $result->lastName ;
                $_SESSION['email'] = $result->email ;
                $_SESSION['_id'] = $result->s_id ;
                Header("Location: ../student.php?succsess=Update%Succsess");}
        }
    }
    else{

        // if trying to access this Script without 
        // Submitting the form
        Header('Location: ../register.php?error=unknownAccess');
        exit();

    }

$conn = null;