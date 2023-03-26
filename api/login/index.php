<?php
   
    require_once '../../util/db.php';

    $conn = OpenCon();

     // Geting data from Get
     $name = $_GET['name'];
     $password = $_GET['password'];

    //main
    $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
    
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $obj = array('status' => TRUE, 'auth' => $name);
    }else{
        $obj = array('status' => FALSE, 'auth' => "");
    }



    header('Content-Type: application/json');
    echo json_encode($obj);

    CloseCon($conn);
?>