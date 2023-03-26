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

        

        $row = $result->fetch_assoc();

        $user = array(
            'name' => $row['name'],
            'email' => $row['email'],
            'osztaly' => $row['osztaly']
            'auth' =>
        );

        $obj = array('status' => TRUE, 'user' => $user);
    }else{
        $obj = array('status' => FALSE, 'user' => "");
    }



    header('Content-Type: application/json');
    echo json_encode($obj);

    CloseCon($conn);
?>