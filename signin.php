<?php 
    ob_start();
    require 'header.php';
?>
<main class="Main sin_main">
        <?php
            require 'PHPScripts/error.signin.sc.php';
        ?>
        <div id="container">
            
            <!-- back to Home -->
            <a id="back" href="index.php"><img src="images/back_arrow.png" alt=""></a>

            <h1 id="sign_title">Enter your email address and <br>Student ID to SIGN-IN</h1>

            <form action="PHPScripts/signin.sc.php" method="POST">

                <div class="signin_form">

                    <div class="inputBox" id="singn_email">
                        <input type="text" name="email" id="in_email" required="">
                        <label id="l_email">Email address</label>
                    </div>
                    <!-- End email -->

                    <div class="inputBox" id="signin_id">
                        <input type="text" name="id" id="in_id" required="">
                        <label id="l_id">Id number</label>
                    </div>
                    <!-- End ID -->

                    <div id="signin">
                        <input type="submit" name="Signin" value="Signin"></input>
                    </div>
                    <!-- End Submit -->

                    <div id="signin_admin">
                        <a href="#" onclick="changeLocalAgain()">Sign in as admin</a>
                    </div>
                    <!-- End As Admin -->

                </div>

            </form><!-- End Signin Form -->

        </div><!-- End Container -->
    <script>window.onload=function(){document.title = 'Sign in here';onClickAsAdmin();}</script>
</main> <!-- End Main -->
<?php 

?>