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

    $conn = OpenCon();

     // Geting data from Get
     $name = $_GET['name'];
     $password = $_GET['password'];

    //main
    $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
    
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $obj = array('status' => TRUE);
    }else{
        $obj = array('status' => FALSE);
    }



    header('Content-Type: application/json');
    echo json_encode($obj);

    CloseCon($conn);
?>