<?php
    require("sql.php");
    $q = intval($_GET['bin']);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bin Locator</title>
<link href="stylesheets/datagrids.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php 
        $a = get_binlocation($q);
        if (count($a) == 0){
            echo "There was no data found";          
        }else{
            $count = 0;
            echo '<table class="tablegrid">
                 <tr>
                     <th Class="thgrid">Item ID</th>
                     <th class="thgrid">Bin ID</th>
                     <th class="thgrid">Location Name</th>
                     <th class="thgrid">Address</th>
                     <th class="thgrid">Physical Location</th>
                     <th class="thgrid">Item</th>
                     <th class="thgrid">Model Number</th>
                     <th class="thgrid">Serial Number</th>';
                     while($count < count($a)){
                        echo '<tr>';
                         echo '<td class="tdgrid">' . $a[$count]['content_id'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['bin_number'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['name'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['address'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['unit_number'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['item'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['model'] . '</td>';
                         echo '<td class="tdgrid">' . $a[$count]['serial'] . '</td>';
                        echo "</tr>";
                        $count++;
                    }
            }


    ?>
</body>
</html>