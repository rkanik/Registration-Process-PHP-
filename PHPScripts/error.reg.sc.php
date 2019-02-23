<?php

    if( isset($_GET['error']) ){
        if( $_GET['error'] == "Empty%Field"){
            echo'
            <div class="Error">
                <p>Please fill up the fields correctly and<br>Try agin!</p>
            </div>';
        }
        elseif ( $_GET['error'] == 'Invalid%Email') {
            echo'
            <div class="Error">
                <p>Please enter a valid Email Address!</p>
            </div>';
        }
        elseif ( $_GET['error'] == 'Slot%Error') {
            echo'
            <div class="Error">
                <p>Please select a slot and click SUBMIT!</p>
            </div>';
        }
        elseif ( $_GET['error'] == 'Duplicate%Registration') {
            echo'
            <div class="Error">
                <p>Your have registered already!<br>
                Sign in with your Email & Id Number<br>
                to see your registration</p>
            </div>';
        }
        elseif ( $_GET['error'] == 'SeatNotAvailable' ) {
            echo'
            <div class="Error">
                <p>Seat not available for selected slot!</p>
            </div>';
        }
        elseif ( $_GET['error'] == 'Signin%First' ) {
            echo'
            <div class="Error">
                <p>Please Signin first</p>
            </div>';
        }
        else{
            echo'';
        }
    }
    elseif ( isset($_GET['succsess']) ){
        echo'
        <div class="succsess">
            <p>Registration Successful,
            go to signin page and signin
            to see your registration</p>
        </div>';
    }
?>