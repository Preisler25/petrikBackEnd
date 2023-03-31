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
            echo("nem")
            return FALSE;
        } else {
            echo("igen")
            return TRUE;
        }
    }

    CloseCon($conn);

    */
?>