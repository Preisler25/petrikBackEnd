<?php
    $obj = array(
        "id" => $_POST['id'],
        "title" => $_POST['title'],
        "description" => $_POST['description'],
        "image" => $_POST['image'],
    );
    echo json_encode($obj);
?>