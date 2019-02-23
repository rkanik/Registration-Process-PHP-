<?php 
    ob_start();
    require "header.php";

    if( !isset( $_SESSION['success'] )){
        Header("Location: signin.php?error=Signin%First");
        exit();
    }
?>

<Main class = "Main stu_main">
    <?php
        require 'PHPScripts/err_suc_stu.sc.php';
    ?>
    <div class="popup">
        <div class="cancelreg">
            <p>Are you sure to CANCEL your registration!</p>
            <form class="stu_dia_pf" action="PHPScripts/change_up_can.sc.php" method="POST"><input type="submit" name="cancelreg" value="DONE"></form>
            <p id="stu_dia_no" onclick=onClickNO()>NO</p>
        </div>
        <div class="updateSlot">
            <p>Select your slot to update!</p>
            <form class="stu_dia_pf" action="PHPScripts/change_up_can.sc.php" method="POST">
            <?php require 'PHPScripts/select.sc.php'?>
            <input type="submit" name="update_slot" value="UPDATE">
            <p id="stu_dia_no" onclick=onClickNO()>CANCEL</p></form>
        </div>
    </div>

    <div class="stu_center">
        <a href="#" id="logout" onclick=logout() ><img src="images/logout.png" alt="Logout" ></a>
        <h1 id="sc_h1">Here is your profile information</h1>

        <div class="sc_grid">
            <div class="sc_grid_data">
                <p>First name</p>
                <h2><?php echo $_SESSION['firstName'] ?></h2>
            </div>
            <div class="sc_grid_data">
                <p>Last Name</p>
                <h2><?php echo $_SESSION['lastName'] ?></h2>
            </div>
            <div class="sc_grid_data">
                <p>Full Name</p>
                <h2><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></h2>
            </div>
            <div class="sc_grid_data">
                <p>ID Number</p>
                <h2><?php echo $_SESSION['_id'] ?></h2>
            </div>
            <div class="sc_grid_data sc_grid_email">
                <p>Email Address</p>
                <h2><?php echo $_SESSION['email'] ?></h2>
            </div>
            <div class="sc_grid_data">
                <p>Registered Slot</p>
                <h2><?php echo $_SESSION['slotName'] ?></h2>
            </div>
            <div class="sc_grid_data">
                <p>Time</p>
                <h2><?php echo $_SESSION['slotTime'] ?></h2>
            </div>
            <div class="sc_grid_right">
                <form action="PHPScripts/del_up.sc.php" method="POST">
                    <p id="cReg" onclick= cancelRegDialog('update')>UPDATE</p>
                    <p id="cReg" onclick= cancelRegDialog('change_reg')>CHANGE SLOT</p>
                    <p id="cReg" onclick= cancelRegDialog('c_reg')>CANCEL REG</p>
                </form>
            </div>
        </div>
    </div>
<script>window.onload=function(){document.title = 'Profile of Student'}</script>
</Main>