<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database_characters";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM characters ORDER BY name");
        $characters = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }
?>