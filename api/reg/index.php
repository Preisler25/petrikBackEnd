<?php

    include_once '../../util/db.php';
    include_once '../../util/regLogic.php';

    $conn = OpenCon();

    $name = $_GET['name'];
    $password = $_GET['password'];
    $email = $_GET['email'];
    $osztaly = $_GET['osztaly'];

    $valid = chUser($name, $conn);


    if($valid){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `user` (`name`, `password`, `email`, `osztaly`) VALUES ('$name', '$password', '$email', '$osztaly');";
        $res = $conn->query($sql);
        if($res){

            $user = array(
                'name' => $name,
                'osztaly' => $osztaly,
            );

            $obj = array('status' => TRUE, 'user' => $user);
            each($obj);
        }else{
            $obj = array('status' => FALSE);
            each($obj);
        }
    }
    else{
        $obj = array('status' => FALSE);
        each($obj);
    }
?>