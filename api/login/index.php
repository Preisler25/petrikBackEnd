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

    // Insert data
    function sql($conn, String $sql)
    {
        if ($conn->query($sql) === TRUE) {
        } else {
            echo("error");
         }
    }

    $conn = OpenCon();

     // Geting data from Get
     $name = $_GET['name'];
     $password = $_GET['password'];

    //main
    $sql = "INSERT INTO `user` (`name`, `email`, `password`, `osztaly`) VALUES ('$name', 'test@gmail.com', '$password', '9.NY');";
    
    // send back user

    $obj = array(
        "name" => $name,
        "password" => $password
    );

    header('Content-Type: application/json');
    echo json_encode($obj);

    sql($conn, $sql);
    CloseCon($conn);
?>