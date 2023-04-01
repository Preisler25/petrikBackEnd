<?php

    require_once '../../util/db.php';
    require_once '../../util/regLogic.php';
    require_once '../../util/passwordValidation.php';

    // Connect to the database
    $conn = OpenCon();

    // Validate and sanitize input data
    $name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
    $password = $_GET['password'];
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $osztaly = filter_var($_GET['osztaly'], FILTER_SANITIZE_STRING);
    $fullname = filter_var($_GET['fullname'], FILTER_SANITIZE_STRING);

    // Check if username is already taken
    $valid = chUser($name, $conn);

    if($valid){

        // Validate password strength
        $passwordValidation = new PasswordValidation();
        $passwordStrength = $passwordValidation->validate($password);

        if($passwordStrength->isValid()){

            // Hash the password with a strong algorithm
            $passwordHash = password_hash($password, PASSWORD_ARGON2ID);

            // Prepare the SQL statement
            $stmt = $conn->prepare("INSERT INTO user (name, password, email, osztaly, fullname) VALUES (?, ?, ?, ?, ?)");

            // Bind the parameters to the statement
            $stmt->bind_param("sssss", $name, $passwordHash, $email, $osztaly, $fullname);

            // Execute the statement
            if($stmt->execute()){

                // Generate a key for the user
                $key = password_hash($email, PASSWORD_ARGON2ID);

                // Create a user object with the relevant information
                $user = array(
                    'name' => $name,
                    'osztaly' => $osztaly,
                    'key' => $key,
                    'fullname' => $fullname,
                );

                // Create a success response with the user object
                $obj = array('status' => TRUE, 'user' => $user);
            }else{

                // Create a failure response with empty user object
                $user = array(
                    'name' => '',
                    'osztaly' => '',
                    'key' => '',
                    'fullname' => '',
                );

                $obj = array('status' => FALSE, 'user' => $user);
            }
        }else{

            // Create a failure response with empty user object
            $user = array(
                'name' => '',
                'osztaly' => '',
                'key' => '',
                'fullname' => '',
            );

            $obj = array('status' => FALSE, 'user' => $user, 'message' => 'Password does not meet requirements');
        }
    }
    else{

        // Create a failure response with empty user object
        $user = array(
            'name' => '',
            'osztaly' => '',
            'key' => '',
            'fullname' => '',
        );

        $obj = array('status' => FALSE, 'user' => $user, 'message' => 'Username is already taken');
    }

    // Close the database connection
    CloseCon($conn);

    // Set the response header to JSON
    header('Content-Type: application/json');

    // Output the response as JSON
    echo json_encode($obj);

?>
