<?php 
    ob_start();
    require "header.php";
    if( !isset( $_SESSION['success'] )){
        Header("Location: signin.php?error=Signin%First");
        exit();
    }
?>

<Main class="Main ad_main">

    <div class="admin_center">
    <a id="logout" onclick=logout() ><img src="images/logout.png" alt=""></a>

        <div class="admin_center_left">

            <h1 id="acl_title">Manage registered students</h1>
            <form action="PHPScripts/admin.sc.php" method="POST">
            <div class="acl_selectorBox">
                <select id="acl_selector" name="slot">
                    <option value="sel_all">Show All</option>
                    <option value="slot_01">Slot 01</option>
                    <option value="slot_02">Slot 02</option>
                    <option value="slot_03">Slot 03</option>
                    <option value="slot_04">Slot 04</option>
                </select>
                <script>
                    function setSelected(i){
                        var x = document.getElementById('acl_selector') ;
                        x.options[i].selected = true ;
                        return ;
                    }
                    setSelected(<?php if(isset($_SESSION['i'])){echo $_SESSION['i'];}else{echo $_GET['i'];};?>);
                </script>
            </div>
            <button type="submit" name="show" id="acl_btn">SHOW</button>

            <div class="searchBox">
                <input type="text" name="searchInput" placeholder="Enter ID to search">
                <button type="submit" name="searchBtn"><img src="images/search-solid.svg" alt="Search"></button>
            </div>
            </form>
        </div>

        <div class="admin_center_right">
            <!-- <h2 id="acr_slot_name">Slot 08:30 - 12:00</h2> -->
            <?php

                if(isset($_SESSION['result'])){
                    echo '<h2 id="acr_slot_name">'.$_SESSION['title'].'</h2>';
                    $count = 0 ;
                    foreach ( $_SESSION['result'] as $value) {
                        $count++;
                        echo '
                        <ul id="acr_ul">
                            <li id="acr_li">
                                <p>Name: <span class="acr_li_p_span">'.$value->firstName.' '.$value->lastName.'</span></p>
                                <p>ID: <span class="acr_li_p_span">'.$value->s_id.'</span></p>
                                <p>Email: <span class="acr_li_p_span">'.$value->email.'</span></p>
                                <p>Slot: <span class="acr_li_p_span">'.$value->slot.'</span></p>
                            </li>
                            <p id="count">'.$count.'</p>
                        </ul>';
                    }
                }
                elseif (isset($_GET['error'])) {
                    echo '<h2 id="acr_slot_name">No registration found!</h2>';
                }
            ?>
            <!-- <ul id="acr_ul">
                <li id="acr_li">
                    <p>Name: <span class="acr_li_p_span">Md. Rasel Khandkar</span></p>
                    <p>ID: <span class="acr_li_p_span">161-15-7040</span></p>
                    <p>Email: <span class="acr_li_p_span">rkanik@gmail.com</span></p>
                </li>
            </ul> -->
        </div>

    </div> <!-- End Container -->
<script>window.onload=function(){document.title = 'Admin Panel'}</script>
</Main> <!-- End Main -->

<?php 
    // Footer
?>