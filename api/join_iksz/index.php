<?php

    include_once '../../util/db.php';

    $conn = OpenCon();

    $name = $_GET['name'];
    $key = $_GET['key'];
    $ik = $_GET['ik'];

    $sql = "Select * from user where name = '$name'";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $email = $row['email'];
        $name = $row['name'];


        $valid = password_verify($email, $key);

        if($valid){
    
            $sql = "Select * from user where name = '$name'";
            $result = $conn->query($sql);
    
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $user_id = $row['id'];
    
    
                $sql = "Insert into $ik (user_id) values ('$user_id')";
                $result = $conn->query($sql);

                if($result){
                    $obj = array('status' => TRUE);
        
                    header('Content-Type: application/json');
                    echo json_encode($obj);
                }else{

                    $obj = array(
                    'status' => FALSE,
                );
        
                    header('Content-Type: application/json');
                    echo json_encode($obj);
                }
            }
        }
    }
?>