<select id="select" name="slot">
    <option value="sel_slot">Select your slot</option>
    <option value="slot_01"><?php
        $sql = "SELECT count(slot) as count from registrations where slot = 'slot_01'";
        require 'PHPScripts/availableseat.sc.php';
        (int)$reg = $result->count ; $avai = 8 - $reg ;
        echo 'Slot 01 | Registered: '.$reg.' | Available: '.$avai;
    ?></option>
    <option value="slot_02"><?php
        $sql = "SELECT count(slot) as count from registrations where slot = 'slot_02'";
        require 'PHPScripts/availableseat.sc.php';
        (int)$reg = $result->count ; $avai = 8 - $reg ;
        echo 'Slot 02 | Registered: '.$reg.' | Available: '.$avai;
    ?>
    </option>
    <option value="slot_03"><?php
        $sql = "SELECT count(slot) as count from registrations where slot = 'slot_03'";
        require 'PHPScripts/availableseat.sc.php';
        (int)$reg = $result->count ; $avai = 8 - $reg ;
        echo 'Slot 03 | Registered: '.$reg.' | Available: '.$avai;
    ?>
    </option>
    <option value="slot_04"><?php
        $sql = "SELECT count(slot) as count from registrations where slot = 'slot_04'";
        require 'PHPScripts/availableseat.sc.php';
        (int)$reg = $result->count ; $avai = 8 - $reg ;
        echo 'Slot 04 | Registered: '.$reg.' | Available: '.$avai;
    ?>
    </option>
</select>