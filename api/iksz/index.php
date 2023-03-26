<?php

    include_once '../../util/db.php';
    include_once '../../util/ikszLogic.php';

    $conn = OpenCon();

    $sql = "SELECT * FROM `iksz`";

    $res = $conn->query($sql);

    $posts = array();

    
    while($row = $res->fetch_assoc()) {
        $posts[] = [
            "id" => intval($row['id']),
            "free_spaces" => intval(FreeSpacesLeft($row['title'], $conn)),
            "title" => $row['title'],
            "description" => $row['description'],
            "img_url" => $row['img_url']
        ];
    }
    $obj = array(
        "posts" => $posts
    );

    header('Content-Type: application/json');
    echo json_encode($obj);


?>