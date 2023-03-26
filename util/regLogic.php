<?php
    function chUser($name, $conn)
    {
        $sql = "SELECT * FROM user WHERE name = '$name'";
        $res = $conn->query($sql);

        echo $res->num_rows;

        if ($res->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
?>

