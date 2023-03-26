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
        $sql = "INSERT INTO `user` (`name`, `password`, `email`, `osztaly`) VALUES ('$name', '$password', '$email', '$osztaly');";
        $res = $conn->query($sql);
        if($res){
            $obj = array('status' => TRUE, 'auth' => $name);
        }else{
            $obj = array('status' => FALSE 'auth' => "");
        }
    }
    else{
        $obj = array('status' => FALSE, 'auth' => "");
    }

?>