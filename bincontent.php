<?php
    session_start();
    require('sql.php');
    $q = intval($_GET['q']);
    $bins = get_currentbincontents($q);
    if (count($bins) == 0){
        echo "Bin " . substr($q,-2) . " Currently has no content <br />";          
    }else{
        $count = 0;
        echo '<th Class="thgrid">Item ID</th>
             <th class="thgrid">Item</th>
             <th class="thgrid">Model Number</th>
             <th class="thgrid">Serial Number</th>';
             while($count < count($bins)){
                echo '<tr>';
                 echo '<td class="tdgrid">' . $bins[$count]['content_id'] . '</td>';
                 echo '<td class="tdgrid">' . $bins[$count]['item'] . '</td>';
                 echo '<td class="tdgrid">' . $bins[$count]['model'] . '</td>';
                 echo '<td class="tdgrid">' . $bins[$count]['serial'] . '</td>';
                 echo "</tr>";
                 $count++;
                }
        }
?>
<tr>
    <td colspan="4" style="padding-bottom:10px;padding-top:20px">
        <table width="50%">
        <?php
            echo '<tr>';
            echo '  <td align="right">Item:</td>';
            echo '  <td align="left"><input type="text" name"item" id="item"></td>';
            echo '  <td align="right">Model No.:</td>';
            echo '  <td align="left"><input type="text" name"model" id="model"></td>';
            echo '  <td align="right">Serial No.:</td>';
            echo '  <td align="left"><input type="text" name"serial" id="serial"></td>';
            echo '</tr>';
            echo '<tr>';
            echo '  <td align="right"><input type="submit" name="submit" id="submit"></td>';
            echo '  <td align="left"></td>';
            echo '  <td align="right"></td>';
            echo '  <td align="left"></td>';
            echo '  <td align="right"></td>';
            echo '  <td align="left"></td>';
            echo '</tr>';
            ?>    
        </table>
    </td>
</tr>