<?php

    if( isset($_GET['error']) ){
        if ( $_GET['error'] == 'SlotNotAvailable' ) {
            echo'
            <div class="Error">
                <p>Selected Slot not available!</p>
            </div>';
        }
    }
    elseif ( isset($_GET['succsess']) ){
        if( $_GET['succsess'] == 'UpdateSuccsess'){
            echo'
            <div class="succsess">
                <p>Slot Successfully Updated!</p>
            </div>';

        }elseif( $_GET['succsess'] == 'Signin%Successful'){
            echo'
            <div class="succsess">
                <p>Signin Succsessful!</p>
            </div>';

        }elseif( $_GET['succsess'] == 'Update%Succsess'){
            echo'
            <div class="succsess">
                <p>Profile Successfully Updated!</p>
            </div>';

        }
        
    }
?>