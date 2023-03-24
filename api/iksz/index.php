<?php
    $obj = array(
        "id" => 1,
        "title" => "körte",
        "description" => "adsadasdasdasda",
        "image" => "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png"
    );

    $obj2 = array(
        "id" => 2,
        "title" => "alma",
        "description" => "adsadasdasdasda",
        "image" => "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png"
    );

    $obj3 = array(
        "posts" => array($obj, $obj2)
    );

    header('Content-Type: application/json');
    echo json_encode($obj3);

?>