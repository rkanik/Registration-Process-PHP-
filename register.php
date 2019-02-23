<?php 
    ob_start();
    require 'header.php';
?>

    <main class="Main reg_main">
        <?php
            require 'PHPScripts/error.reg.sc.php';
        ?>
        
        <div id="container" class="regcon">
            <a id="back" href="index.php"><img src="images/back_arrow.png" alt=""></a>
            <?php if( isset($_GET['mess']) && $_GET['mess'] == 'update'){
                echo '<h2 id="title">Update your profile</h2>';
            }else{echo '<h2 id="title">Complete your registration here</h2>';}?>

            <form action="PHPScripts/register.sc.php" method="POST">
                <div class="sec_form">
                    <div class="inputBox" id="firstName">
                        <input type="text" name="firstName" required="" value = "<?php if(isset($_GET['firstName'])){echo $_GET['firstName'];}elseif( isset($_GET['mess']) && isset($_SESSION['firstName'])){echo $_SESSION['firstName'];}else{echo '';}?>">
                        <!-- <input type="text" name="firstName" required=""> -->
                        <label>First name</label>
                    </div>
                    <div class="inputBox" id="lastName">
                        <input type="text" name="lastName" required="" value = "<?php if(isset($_GET['lastName'])){echo $_GET['lastName'];}elseif( isset($_GET['mess']) && isset($_SESSION['lastName'])){echo $_SESSION['lastName'];}else{echo '';}?>">
                        <label>Last name</label>
                    </div>
                    <div class="inputBox" id="email">
                        <input type="text" name="email" required="" value = "<?php if(isset($_GET['email'])){echo $_GET['email'];}elseif( isset($_GET['mess']) && isset($_SESSION['email'])){echo $_SESSION['email'];}else{echo '';}?>">
                        <label>Email address</label>
                    </div>
                    <div class="inputBox" id="idnumber">
                        <input type="text" name="id_number" required="" value = "<?php if(isset($_GET['id_number'])){echo $_GET['id_number'];}elseif( isset($_GET['mess']) && isset($_SESSION['_id'])){echo $_SESSION['_id'];}else{echo '';}?>">
                        <label>ID number</label>
                    </div>
                    <div id="blank"></div>
                    <!-- <div class="inputBox select">
                        
                    </div> -->
                    <?php 
                        if( isset( $_GET['mess'] ) && $_GET['mess'] == 'update' ){

                            echo '';

                        }else{
                            echo '<div class="inputBox select">';
                            require 'PHPScripts/select.sc.php';
                            echo '</div>';
                        }
                    ?>
                    <!-- END inputBox select -->
                    <div class="fo_right">
                        <?php 
                        if( isset( $_GET['mess'] ) ){
                            if( $_GET['mess'] == 'update' ){
                                echo '
                                <div id="fo_submit">
                                    <input type="submit" name="update" value="UPDATE">
                                </div>';

                                echo'
                                <div class="fo_reset">
                                <a href="student.php">CANCEL</p>
                                </div>';
                            }
                        }
                        else{
                            echo '
                            <div id="fo_submit">
                                <input type="submit" name="submit" value="SUBMIT">
                            </div>';

                            echo'
                            <div class="fo_reset">
                                <a href="register.php">RESET</p>
                            </div>';
                        }?>
                    </div>

                </div>

            </form>

        </div>
        <script>window.onload=function(){document.title = 'Register to get your slot'}</script>
    </main><!-- End Main -->

<?php 
    // Footer
?>