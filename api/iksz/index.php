<?php

    include_once '../../util/db.php';

    $conn = OpenCon();

    $sql = "SELECT * FROM `iksz`";

    $res = $conn->query($sql);

    $posts = array();

    
    while($row = $res->fetch_assoc()) {
        $posts[] = $row;
    }

    $obj = array(
        "posts" => $posts
    );
    


    header('Content-Type: application/json');
    echo json_encode($obj);


?>