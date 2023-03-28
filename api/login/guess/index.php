<?php

    $user = array(
        'name' => 'Guest',
        'osztaly' => '0',
    );

    $obj = array('status' => TRUE, 'user' => $user);


    header('Content-Type: application/json');
    echo json_encode($obj);
?>