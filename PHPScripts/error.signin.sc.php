<?php

    if( isset($_GET['error']) ){
        if ( $_GET['error'] == 'Signin%First' ) {
            echo'
            <div class="Error">
                <p>Please Signin first</p>
            </div>';
        }
        else if ( $_GET['error'] == 'Invalid' ) {
            echo'
            <div class="Error">
                <p>Invalid Student ID or Password!</p>
            </div>';
        }
        else if ( $_GET['error'] == 'Empty%Field' ) {
            echo'
            <div class="Error">
                <p>Plese enter your ID & Email to signin</p>
            </div>';
        }
        else{
            echo'';
        }
    }elseif( isset($_GET['mess']) && $_GET['mess'] == 'Signed%Out' ){
        echo'
        <div class="succsess">
            <p>Signed out!</p>
        </div>';
    }
?>