<?php

    include_once '../../util/db.php';
    include_once '../../util/regLogic.php';

    $conn = OpenCon();

    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $osztaly = $_POST['osztaly'];

    $valid = chUser($name, $conn);

    if($valid){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `user` (`name`, `password`, `email`, `osztaly`, `auth`) VALUES ('$name', '$password', '$email', '$osztaly', '$auth');";
        $res = $conn->query($sql);
        if($res){

            $user = array(
                'name' => $name,
                'osztaly' => $osztaly,
            );

            $obj = array('status' => TRUE, 'user' => $user);
        }else{
            $obj = array('status' => FALSE);
        }
    }
    else{
        $obj = array('status' => FALSE);
    }

?>