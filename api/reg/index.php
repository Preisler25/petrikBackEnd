<?php

    include_once '../../util/db.php';
    include_once '../../util/regLogic.php';

    $conn = OpenCon();

    $name = $_GET['name'];
    $password = $_GET['password'];
    $email = $_GET['email'];
    $osztaly = $_GET['osztaly'];
    $fullname = $_GET['fullname'];

    $valid = chUser($name, $conn);


    if($valid){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `user` (`name`, `password`, `email`, `osztaly`,`fullname`) VALUES ('$name', '$password', '$email', '$osztaly','$fullname');";
        $res = $conn->query($sql);
        if($res){
            $key = password_hash($email, PASSWORD_DEFAULT);

            $user = array(
                'name' => $name,
                'osztaly' => $osztaly,
                'key' => $key,
                'fullname' => $fullname,
            );

            $obj = array('status' => TRUE, 'user' => $user);
        }else{

            $user = array(
                'name' => '',
                'osztaly' => '',
                'key' => '',
                'fullname' => '',
            );

            $obj = array('status' => FALSE, 'user' => $user);
        }
    }
    else{

        $user = array(
            'name' => '',
            'osztaly' => '',
            'key' => '',
            'fullname' => '',
        );

        $obj = array('status' => FALSE, 'user' => $user);
    }

    CloseCon($conn);

    header('Content-Type: application/json');
    echo json_encode($obj);

?>