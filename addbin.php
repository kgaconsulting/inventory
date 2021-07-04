<?php
    session_start();
    require('sql.php');   
    $bins = get_binlist();
    $arraylengh=count($bins);
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table class="tablegrid">
        <tr>
            <td colspan="3"><label for="bins">Select bin for new items:</label>
                <?php
                    echo '<select name="bins" onChange="getbincontent(value)" id=selectedbin>';
                    $count=0;
                    echo '<option value="0"  selected>--Select Bin--</option>';
                    while ($count < $arraylengh){
                        unset($id,$name);
                        $id=$bins[$count]['bin_id'];
                        $name=$bins[$count]['bin_number'];
                        echo '<option value="'.$id.'">'.$name.'</option>';
                        $count++;
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4"><hr></td>
        </tr>
        <tbody id="bincontent">
                <td colspan="4">&nbsp;</td>
        </tbody>
    </table>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
//        $binID = $_POST['bins'];
//        $siteID = $_POST['newsite'];
//        $unitID = $_POST['newunit'];
//        $savedUpdate = savedUpdate($binID,$siteID,$unitID);
//        if ($savedUpdate == 1){
            echo "<script>window.location.href='home.php?q=1&r=".$activebin."';</script>";
//        }else{
//            echo "Massive Failure Occured!";
//        }
    }

    ?>
