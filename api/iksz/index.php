<?php
    $obj = array(
        "id" => 1,
        "title" => "körte",
        "description" => "adsadasdasdasda",
        "image" => "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png"
    );

    header('Content-Type: application/json');
    echo json_encode($obj);

?>