<?php
    require_once '../../util/db.php';


    $conn = OpenCon();

     // Geting data from Get
     $name = $_GET['name'];
     $password = $_GET['password'];


     $password = password_hash($password, PASSWORD_DEFAULT);
     echo $password;
    //main
    $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
    
    $result = $conn->query($sql);

    

    if($result->num_rows > 0){

        

        $row = $result->fetch_assoc();

        $user = array(
            'name' => $row['name'],
            'osztaly' => $row['osztaly'],
        );

        $obj = array('status' => TRUE, 'user' => $user);
    }else{
        $obj = array('status' => FALSE);
    }



    header('Content-Type: application/json');
    echo json_encode($obj);

    CloseCon($conn);
?>