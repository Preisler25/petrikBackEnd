<?php
require_once '../../util/db.php';
require_once '../../util/logLogic.php';

$conn = OpenCon();

// Geting data from Get
$name = $_GET['name'];
$password = $_GET['password'];

// validating password
include_once '../../util/passwordValidation.php';
if(!validatePassword($password)){
    $user = array(
        'name' => '',
        'osztaly' => '',
        'key' => '',
        'fullname' => '',
    );
    $obj = array('status' => FALSE, 'user' => $user);
    header('Content-Type: application/json');
    echo json_encode($obj);
    exit();
}

$valid = chPass($conn, $name, $password);

//main
if($valid){
    //prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $key = password_hash($row['email'], PASSWORD_DEFAULT);

        $user = array(
            'name' => $row['name'],
            'osztaly' => $row['osztaly'],
            'key' => $key,
            'fullname' => $row['fullname'],
        );

        $obj = array('status' => TRUE, 'user' => $user);
    }else{

        $user = array(
            'name' => '',
            'osztaly' => '',
            'key' => '',
            'fullname' => '',
        );

        $obj = array('status' => FALSE, 'user' => $user);
    }
}
else{

    $user = array(
        'name' => '',
        'osztaly' => '',
        'key' => '',
        'fullname' => '',
    );

    $obj = array('status' => FALSE, 'user' => $user);
}

header('Content-Type: application/json');
echo json_encode($obj);

CloseCon($conn);
?>
