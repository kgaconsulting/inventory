 <?php
    session_start();
    require("sql.php");
    $bins = get_binlist();
    $arraylengh=count($bins);
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table width="100%">
        <tr>
            <td colspan="3"><label for="bins">Select bin to change location:</label>
                <?php
                    echo '<select name="bins" onChange="updatebins(value)" id=selectedbin>';
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
            <td colspan="3"><hr></td>
        </tr>
        <tr>
            <td>Current Bin ID</td>
            <td>Current Bin Site</td>
            <td>Current Bin Location </td>
        </tr>
        <tbody id="binupdates">
            <td></td>
            <td></td>
            <td></td>
        </tbody>
    </table>
</form>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $binID = $_POST['bins'];
        $siteID = $_POST['newsite'];
        $unitID = $_POST['newunit'];
        $savedUpdate = savedUpdate($binID,$siteID,$unitID);
        if ($savedUpdate == 1){
            echo "<script>window.location.href='home.php?q=3';</script>";
        }else{
            echo "Massive Failure Occured!";
        }
    }
?>