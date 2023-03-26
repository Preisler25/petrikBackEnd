<?php
    function chUser($name, $conn)
    {
        $sql = "SELECT * FROM user WHERE name = '$name'";
        $res = $conn->query($sql);


        if ($res->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
?>

