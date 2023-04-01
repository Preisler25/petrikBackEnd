<?php

    include_once 'db.php';
    $conn = OpenCon();

    function chUser($name, $conn)
    {
        $sql = "SELECT * FROM user WHERE name = '$name'";
        $res = $conn->query($sql);

        $num_of_rows = $res->num_rows; 

        if ($num_of_rows > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    CloseCon($conn);

?>