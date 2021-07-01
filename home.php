<?php
    session_start();
    ob_start();
?>
<?php

/*
    All code is copyright 2021 KGA Consulting Services
    All rights reserved.
    See licence.txt
*/

?>
<!doctype html>
<html>
    <head>
        <title>Storage Manager</title>
        <link href="stylesheets/main.css" rel="stylesheet" tyle="text/css">
        <link href="stylesheets/SiteStyles.css" rel="stylesheet" type="text/css">
        <link href="stylesheets/datagrids.css" rel="stylesheet" type="text/css">
        <script src="/scripts/jquery-3.6.0.min.js"></script>
        <script src="/scripts/service.js"></script>
        <?php 
          $isLoggedin = $_SESSION['loggedin'];
            if ($isLoggedin != 1){
                header("location:/index.php");
            } 
        ?>
        <script type="text/javascript"> 
            var myTimer = "";
            var interval = 0;
        </script>
    </head>
    <body onload="display_ct();">
        
        <div>
            <table class="maintable">
                <tr>
                    <td class="maintable td1">
                        <table class="menutable">
                            <tr>
                                <td class =" menutable td5">Storage Menu</td>
                            </tr>
                            <tr>
                                <td class =" menutable td5">
                                    <button class="pushable" onClick="startUpdate('itemslist.php?q=0')"><span class="font">Inventory List</span></button>    
                              </td>
                            </tr>
                            <tr>
                                <td class =" menutable td5">
                                    <button class="pushable" onClick="startUpdate('customers.php')"><span class="font">Add Inventory Item</span></button>
                                </td>
                            </tr>
                            <tr>
                                <td class =" menutable td5">
                                    <button class="pushable"><span class="font">Edit Inventory Item</span></button>
                                </td>
                            </tr>
                            <tr>
                                <td class =" menutable td5">
                                    <button class="pushable" onClick="startUpdate('binupdate.php')"><span class="font">Change Bin Location</span></button>
                                </td>
                            </tr>
                            <tr>
                                <td class =" menutable td5">
                                    <button class="pushable"><span class="font">Maintainance</span></button>
                                </td>
                            </tr>
                            <tr>
                                <td class =" menutable td5">
                                    <button class="pushable" ><span class="font">Log Out</span></button> 
                                </td>
                            </tr>
                            <tr>
                                <td class =" menutable td5"><hr/></td>
                            </tr>
                            <tr>
                                <td class =" menutable1 td1">
                                    <table class="menutable1">
                                        <tbody id="submenu"></tbody>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                    <td class="maintable td2">
                        <div class="clockheader">
                            <div class="clock">
                                <label id="ct1"></label>
                                <label id="ct2" class="clock seconds"></label>
                            </div>
                        </div> 
                        <div id="txtHint" class="frames"><script>startUpdate('itemslist.php?q=0');</script></div>
                    </td>
                </tr>
            </table>
        </div>
        <div>
           <table class="footertable">
               <tr>
                   <td class="footertable  td3"></td>
                   <td class="footertable td4">&#169;2021 KGA Consulting Services</td>
               </tr>
           </table>
        </div>
    </body>
</html>