<?php
    session_start();
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
        <title>System Login</title>
        <link href="stylesheets/main.css" rel="stylesheet" tyle="text/css">
        <link href="stylesheets/SiteStyles.css" rel="stylesheet" type="text/css">
        <script src="/scripts/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="mheader">
            <h1>Storage Location System</h1>
        </div>
        <div class="login">
            <div class="login1">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <table class="logintable">
                        <tr>
                            <td>
                                <table cellpadding="0" style="color:#333333;font-family:Verdana;font-size:0.8em;">
		    	                    <tr>
			    	                    <td align="center" colspan="2" style="color:White;background-color:#507CD1;font-size:0.9em;font-weight:bold;">
                                            Log In
                                        </td>
			                        </tr>
                                    <tr>
				                        <td align="right">
                                            <label for="UserName">User Name:</label>
                                        </td>
                                        <td>
                                            <input name="UserName" type="text"  style="font-size:0.8em;">
                                        </td>
			                        </tr>
                                    <tr>
				                        <td align="right">
                                            <label for="Password">Password:</label>
                                        </td>
                                        <td>
                                            <input name="Password" type="password" style="font-size:0.8em;">
                                        </td>
    			                     </tr>
                                     <tr>
		    		                    <td colspan="2">
                                            <input id="RememberMe" type="checkbox" name="RememberMe"><label for="RememberMe">Remember me next time.</label>
                                         </td>
			                         </tr>
                                     <tr>
				                        <td align="right" colspan="2">
                                            <input type="submit" name="LoginButton" value="Log In" >
                                        </td>
	    		                    </tr>
		                        </table>
                            </td>
                        </tr>
                    </table>
                </form>   
                <?php
                    require 'sql.php';
                   
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $username = $_POST['UserName'];
                        $password = $_POST['Password'];
                        //echo "Inside the processing loop on inital start <br />";
                        if (empty($username)){
                            echo '<span style="color:red">Username cannot be blank</span>';
                        }elseif (empty($password)){
                            echo '<span style="color:red">Password cannot be blank</span>';
                        }else{
                            $isValid = validate_login($username,$password);
                            //echo "Valid user count is " . $isValid;
                            if ($isValid == 1){
                                //$userinfo = get_userinfo($username);
                                //$_SESSION['userId'] = $userinfo[0][emp_id];
                                //$_SESSION['firstname'] = $userinfo[0][fname];
                                //$_SESSION['lastname'] = $userinfo[0][lname];
                                $_SESSION['loggedin'] = 1;
                                header("Location:/home.php");
                                //echo 'It worked';
                            }elseif ($isValid == -1) {
                                echo '<span style="color:red">Invalid username<br />Please re-enter</span>';
                            }elseif ($isValid == -2) {
                                echo '<span style="color:red">Invalid password<br />Please re-enter</span>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>