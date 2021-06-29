 <?php
    require("sql.php");
    echo '<div id="swoupdate">';
        $lPage = 0;
        display_records($lPage);
        function display_records($lPage){
            $a = get_items($lPage);
            if (count($a) == 0){
                echo "There was no data found";          
            }else{
                $count = 0;
                echo '<table class="tablegrid">
                     <tr>
                        <th class="thgrid">Bin ID</th>
                         <th class="thgrid">Location Name</th>
                         <th class="thgrid">Address</th>
                         <th class="thgrid">Physical Location</th>
                         <th class="thgrid">Item</th>
                         <th class="thgrid">Model Number</th>
                         <th class="thgrid">Serial Number</th>';
                         while($count < count($a)){
                            echo '<tr>';
                             echo '<td class="tdgrid">' . $a[$count]['bin_number'] . '</td>';
                             echo '<td class="tdgrid">' . $a[$count]['name'] . '</td>';
                             echo '<td class="tdgrid">' . $a[$count]['address'] . '</td>';
                             echo '<td class="tdgrid">' . $a[$count]['unit_number'] . '</td>';
                             echo '<td class="tdgrid">' . $a[$count]['item'] . '</td>';
                             echo '<td class="tdgrid">' . $a[$count]['model'] . '</td>';
                             echo '<td class="tdgrid">' . $a[$count]['serial'] . '</td>';
    //                        echo '<td class="tdgrid1">
    //                                <button type="button" onClick="showWoDetail(\'' . $a[$count][0] . '\')">Open S.O.</button>
    //                            </td>';
    //                        echo '<td class="tdgrid1">';
    //                                echo "WO Number is ".$a[$count][0];
    //                            echo'</td>';
    //                        echo '<td class="tdgrid1">
    //                                <button>Bill S.O.</button>
    //                            </td>';
                            echo "</tr>";
                            $count++;
                        }
                }

        }
            echo "</table>";
            echo "<table>";
            echo "<tr>";
            echo '<td><button class="pushable"><span class="font">previous</span></button></td>';
            echo '<td><button class="pushable"><span class="font">next</span></button></td>';
            echo "</tr>";
            echo "</table>";
?>
    </div>