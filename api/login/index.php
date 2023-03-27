<?php
    require_once '../../util/db.php';
    require_once '../../util/logLogic.php';

    $conn = OpenCon();

     // Geting data from Get
     $name = $_GET['name'];
     $password = $_GET['password'];

    $valid = chPass($conn, $name, $password);
    //main
    if($valid){
        $sql = "SELECT * FROM user WHERE name = '$name'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();

            $user = array(
                'name' => $row['name'],
                'osztaly' => $row['osztaly'],
            );

            $obj = array('status' => TRUE, 'user' => $user);
        }else{

            $user = array(
                'name' => 'Guest',
                'osztaly' => 'Nincs osztály',
            );

            $obj = array('status' => FALSE);
        }
    }
    else{

        $user = array(
            'name' => 'Guest',
            'osztaly' => 'Nincs osztály',
        );

        $obj = array('status' => FALSE);
    }
    
    header('Content-Type: application/json');
    echo json_encode($obj);

    CloseCon($conn);
?>