<?php
    // Create connection
    function OpenCon()
    {
        $dbhost = "localhost:3306";
        $dbuser = "root";
        $dbpass = "";
        $db = "petrikapp";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }

    // Close connection
    function CloseCon($conn)
        {
            $conn -> close();
        }

?>