<?php 
    ob_start();
    require 'header.php';
?>

    <main  class="Main">
        <div id="welcome">
            <div class="wb Wel-Registration">
                <a href="register.php" 
                onmouseover="onMouseOver(this)" 
                onmouseout="onMouseOut(this)">
                </a>
                <img src="images/membership.png" alt="">
                <div class="divider"></div>
                <h3>Complete your <br> Registration here</h3>
            </div>
            <div class="wb Wel-CheckReg">
                <?php 
                    if ( isset($_SESSION['firstName']) ) {
                        echo '<a href="student.php" 
                        onmouseover="onMouseOver(this)" 
                        onmouseout="onMouseOut(this)">
                        </a>';
                    }else{
                        $asAd = 'asAdmin';
                        echo '
                        <a href="signin.php" 
                        onmouseover="onMouseOver(this)" 
                        onmouseout="onMouseOut(this)"
                        onclick="changeLocal('."'$asAd'".')"></a>';
                    }
                ?>

                <img src="images/test.png" alt="">
                <div class="divider"></div>
                <h3>Check your <br> Registration</h3>
            </div>
            <div class="wb Wel-Admin">

                <a href="signin.php" 
                onmouseover="onMouseOver(this)" 
                onmouseout="onMouseOut(this)" 
                onclick='changeLocal("Student")'></a>

                <img src="images/management.png" alt="">
                <div class="divider"></div>
                <h3>Manage <br>Registrations <br>(Administrator)</h3>
            </div>
        </div>
        <script>window.onload=function(){document.title = 'Welcome to registration'}</script>
    </main>

<?php 

?>
