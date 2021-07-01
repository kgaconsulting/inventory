 <?php
    require("sql.php");
    $bins = get_binlist();
    $arraylengh=count($bins);
?>
<form action="">
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
            <td>current Bin ID</td>
            <td>Current Bin Site</td>
            <td>Current Bin Location </td>
        </tr>
        <tr>
            <td>binID</td>
            <td>siteID</td>
            <td>LocationID</td>
        </tr>
    </table>
</form>