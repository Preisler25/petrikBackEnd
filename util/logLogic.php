<?php

    function chPass($conn, $name, $password)
    {
        $sql = "SELECT * FROM user WHERE name = '$name'";
        $res = $conn->query($sql);

        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
            $pass = $row['password'];

            if(password_verify($password, $pass)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
?>