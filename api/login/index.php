<?php
    // Geting data from Get
    $name = $_GET['name'];
    $password = $_GET['password'];

    // Create connection
    function OpenCon()
    {
        $dbhost = "192.168.1.199:3306";
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

    // Insert data
    function sql($conn, String $sql)
    {
        if ($conn->query($sql) === TRUE) {
          echo "success";
        } else {
          echo "error: " . $conn->error;
         }
    }

    //main
    $conn = OpenCon();
    $sql = "INSERT INTO `user` (`name`, `email`, `password`, `osztaly`) VALUES ('$name', 'test@gmail.com', '$password', '9.NY');";

    sql($conn, $sql);
    CloseCon($conn);
?>