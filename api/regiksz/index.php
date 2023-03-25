<?php
    include_once '../../util/db.php';

    $conn = OpenCon();

    $max = $_POST['max'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img_url = $_POST['image'];

    
    $sql = "INSERT INTO `iksz` (`max`, `title`, `description`, `img_url`) VALUES ( '$max', '$title', '$description', '$img_url');";

    $res = $conn->query($sql);

    echo $res;
?>