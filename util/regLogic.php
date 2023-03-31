<?php

    include_once 'db.php';
    $conn = OpenCon();

    function chUser($conn, $name)
    {
        $sql = "SELECT * FROM user WHERE name = '$name'";
        $res = $conn->query($sql);

        $num_of_rows = $res->num_rows; 
        echo($num_of_rows);

        if ($num_of_rows > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    CloseCon($conn);

?>