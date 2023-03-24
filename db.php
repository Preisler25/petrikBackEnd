<?php
    // Create connection
    function OpenCon()
    {
        $dbhost = "192.168.1.199:3306";
        $dbuser = "root";
        $dbpass = "";
        $db = "ikst";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }

    // Close connection
    function CloseCon($conn)
        {
            $conn -> close();
        }


>