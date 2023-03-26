<?php
    include_once '../../util/db.php';

    $conn = OpenCon();

    $max = $_POST['max'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img_url = $_POST['image'];

    
    $sql = "SELECT * FROM `iksz` WHERE `title` = '$title'";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        echo "Van már ilyen című iksz";
        die();
    }
    else{
        $sql_ins = "INSERT INTO `iksz` (`max`, `title`, `description`, `img_url`) VALUES ( '$max', '$title', '$description', '$img_url');";

        $res_ins = $conn->query($sql_ins);

        if ($res_ins) {
            $sql_table = "Create table $title (user_id int(11))";
            $res_table = $conn->query($sql_table);
            if ($res_table) {
                header("Location: http://localhost/ikszadmin");
                die();
            }
            else{
                echo "table create error";
                die();
            }
        }
        else{
            echo "Sikertelen Insert";
            die();
        }
    }    
?>