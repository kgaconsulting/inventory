<?php
    session_start();
    require('sql.php');
    $q = intval($_GET['q']);
    $cbins = get_currentbindetails($q);
    if (is_null($cbins[0])){
        echo '<td colspan="3">This bin is not currently assigned items </td>';
    }else{
        $sites = get_sitelist();
        $units =get_unitlist();     
        echo '<td>'. $q .  '</td>';
        echo '<td>'. $cbins[0]['name'] . '</td>';
        echo '<td>'. $cbins[0]['unit_number'] . '</td>';
    echo '<tr>
        <td colspan="3"><hr /></td>
        </tr>
        <tr>
        <td>Current Bin ID</td>
        <td>New Bin Site</td>
        <td>New Bin Location </td>
    </tr>
    <tr>';
        echo '<td>' . $q . '</td>
        <td>';
            
                $count = 0;
                $arraylength = count($sites);
                echo '<select name="newsite" id="selectednewsite">';
                while ($count < $arraylength){
                    unset($id,$name);
                    $id = $sites[$count]['site_id'];
                    $name = $sites[$count]['name'];
                    echo '<option value="'.$id.'">'.$name.'</option>';
                    $count++;
                }
                echo '</select>
            
        </td>
        <td>';
            
                $count = 0;
                $arraylength = count($units);
                echo '<select name="newunit" id="selectednewunit">';
                while ($count < $arraylength){
                    unset($id,$name);
                    $id = $units[$count]['unit_id'];
                    $name = $units[$count]['unit_number'];
                    echo '<option value="'.$id.'">'.$name.'</option>';
                    $count++;
                }
                echo '</select>
            
        </td>
    </tr>
    <tr>
        <td colspan="3"><input type="submit" id="submit" name="submit" value="Update Bin" />';
}
?>