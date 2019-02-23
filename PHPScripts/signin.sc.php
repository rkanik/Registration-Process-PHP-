<?php 
    ob_start();
    // Connecting to database
    require 'dbconnection.sc.php';

    if( isset($_POST['Signin']) ){

        $email = trim($_POST['email']);
        $_id = trim($_POST['id']);

        if( empty($email) || empty($_id) ){
            Header("Location: ../signin.php?error=Empty%Field");
            exit();

        }
        else{
            $sql = "SELECT * FROM registrations WHERE s_id=:s_id && email=:email";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':s_id' , $_id );
            $stmt->bindParam(':email' , $email );

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_OBJ);

            var_dump($result);

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

                session_start();
                $_SESSION['success'] = 'Signedin';
                Header("Location: ../student.php?succsess=Signin%Successful");
            }else{
                Header("Location: ../signin.php?error=Invalid");
                exit();
            }
        }
    }
    
    elseif ( isset($_POST['asAdmin']) ) {

        $email = trim($_POST['email']);
        $_id = trim($_POST['id']);

        if( empty($email) || empty($_id) ){
            Header("Location: ../signin.php?error=Empty%Field&sys=asAdmin");
            exit();
        }
        else{
            $sql = "SELECT * FROM admin WHERE userName=:user";
            $stmt = $conn->prepare($sql);

            // $hashed = password_hash($_id,PASSWORD_DEFAULT);
            // echo $hashed ;

            // $stmt->bindParam(':pass' , $_id );
            $stmt->bindParam(':user' , $email );

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if( !empty($result) ){
                
                $passCheck = password_verify($_id,$result->password);

                if( $passCheck === false ){
                    Header("Location: ../signin.php?error=Invalid%Password");
                    exit();
                }elseif ( $passCheck === true ) {
                    session_start();
                    $_SESSION['success'] = 'Signedin';
                    $i=0;
                    Header("Location: ../admin.php?succsess=Signed%in&i=$i");

                }else{
                    Header("Location: ../signin.php?error=Invalid%Password");
                    exit();
                }
            }
            else{
                Header("Location: ../signin.php?error=Invalid%User%Name%or%Password");
                exit();
            }
        }
    }
    
    else{
        // if trying to access this Script without 
        // Submitting the form
        Header('Location: ../signin.php?error=unknownAccess');
        exit();
    }
