<?php

    include_once '../../util/db.php';
    include_once '../../util/ikszLogic.php';

    $conn = OpenCon();

    $name = $_GET['name'];
    $key = $_GET['key'];
    
    $sql = "Select * from user where name = '$name'";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $id1 = $row['id'];
        $email = $row['email'];
        $name = $row['name'];

        $valid = password_verify($email, $key);

        if($valid){
            $sql = "SELECT * FROM `iksz`";
            $res = $conn->query($sql);
            
            $posts = array();
            while($row = $res->fetch_assoc()) {
                $ttl = $row['title'];
                if(chUserIn($ttl, $id1, $conn)){
                    $posts[] = [
                        "id" => intval($row['id']),
                        "free_spaces" => intval(FreeSpacesLeft($row['title'], $conn)),
                        "title" => $row['title'],
                        "description" => $row['description'],
                        "img_url" => $row['img_url']
                    ];
                }
            }
        $obj = array(
            "posts" => $posts
        );

        header('Content-Type: application/json');
        echo json_encode($obj);

    }
}



    

?>