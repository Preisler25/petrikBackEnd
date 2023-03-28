<?php
include_once 'db.php';

function FreeSpacesLeft($title, $conn)
    {
        $sql = "SELECT * FROM `iksz` WHERE `title` = '$title'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $max = $row['max'];
            $sql = "SELECT * FROM `$title`";
            $res = $conn->query($sql);
            if ($res->num_rows < $max) {
                return $max - $res->num_rows;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    function chUserIn($title, $id, $conn)
    {
        $sql = "SELECT * FROM `$title` WHERE `user_id` = '$id'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

?>