    <?php
/*
    copyright KGA Consulting Service 2021
*/

    require ("config.php");
    function dbconnect(){
        static $conn;
        
        if (!$conn) {
            $conn = new mysqli (Server, User, Pass, Dbase);
            if ($conn->connect_errno){
                echo "Failed to connect o MySQL Database " . $mysqli->connect_error; 
            }
        }    
        return $conn;
    }

    function validate_login($uname,$pass){
        $a = 0;
        $b = 0;
        $c = 0;
        $conn = dbconnect();     
        if ($result = $conn -> query("SELECT DATABASE()")) {
            $row = $result -> fetch_row();
            //echo "Default database is " . $row[0] . "<p />\n";
            $result -> close();
         }else{
             echo "NO valid connection exists";
         }
        $sql = "select count(*) as valid1 from users where uname = '$uname'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $b = $row['valid1'];
                if ($b == 1){
                    $sql1 = "select count(*) as valid2 from users where uname = '$uname' and pass = '$pass'";
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0){
                        while($row = $result1->fetch_assoc()){
                            $c = $row['valid2'];
                            if ($c == 1){
                                $a = 1;
                            }else{
                                $a = -2;
                            }
                        }
                    }
                }else{
                    $a = -1;        
                }
            }
        } else {
           $a = -9;
        }
        return $a;
    }
    
    function get_items($offset){
        $a = array();
        $conn = dbconnect();
        if ($result = $conn -> query("SELECT DATABASE()")) {
            $row = $result -> fetch_row();
            //echo "Default database is " . $row[0] . "<p />\n";
            $result -> close();
         }else{
             echo "NO valid connection exists";
         }

        $sql = "select * from searchview limit $offset,25";
        //echo $sql."<br />";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()){
                $a[] = $row;
                $count++;
            }
        }  
        return $a;
    }

    function get_binlocation($q){
        $b = substr($q, -4);
        $a = array();
        $conn = dbconnect();
        if ($result = $conn -> query("SELECT DATABASE()")) {
            $row = $result -> fetch_row();
            //echo "Default database is " . $row[0] . "<p />\n";
            $result -> close();
         }else{
             echo "NO valid connection exists";
         }

        $sql = "select * from searchview where bin_number=$b";
        //echo $sql."<br />";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()){
                $a[] = $row;
                $count++;
            }
        }  
        return $a;
    }

    function get_binlist(){
        $a = array();
        $conn = dbconnect();
        $sql = "select * from bins";
        //echo $sql . "<br />";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()){
                $a[] = $row;
                $count++;
            }
        }  
        return $a;
    }

    function get_sitelist(){
        $a = array();
        $conn = dbconnect();
        $sql = "select * from site";
        //echo $sql . "<br />";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()){
                $a[] = $row;
                $count++;
            }
        }  
        return $a;
    }

    function get_unitlist(){
        $a = array();
        $conn = dbconnect();
        $sql = "select * from unit";
        //echo $sql . "<br />";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()){
                $a[] = $row;
                $count++;
            }
        }  
        return $a;
    }

    function get_currentbindetails($b){
        $a = array();
        $conn = dbconnect();
        $sql = "select distinct contents.bin_id, site.name, unit.unit_number 
                from contents
                inner join site on site.site_id = contents.site_id
                inner join unit on unit.unit_id = contents.unit_id	
                where contents.bin_id = $b";
        //echo $sql . "<br />";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $count = 0;
            while($row = $result->fetch_assoc()){
                $a[] = $row;
                $count++;
            }
        }  
        return $a;
    }

?>