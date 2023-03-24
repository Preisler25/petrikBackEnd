<?php
    require '../db.php';

    echo($_GET["username"]);

    // Az adatbáziskapcsolat használata
    $conn = OpenCon();
    
    // Adatok lekérdezése a táblából
    $sql = "SELECT id, name, email FROM users";
    $result = $conn->query($sql);
    
    // Eredmények megjelenítése
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "Nincs eredmény.";
    }
    
    // Az adatbáziskapcsolat lezárása
    CloseCon($conn);

    $user = array(
        "username" => $_POST["username"],
        "password" => $_POST["password"],
    );
>