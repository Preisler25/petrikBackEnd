<?php
function chUser($name, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $res = $stmt->get_result();
    $num_of_rows = $res->num_rows;

    if ($num_of_rows > 0) {
        return false;
    } else {
        return true;
    }
}
?>