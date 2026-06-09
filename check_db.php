<?php
$mysqli = new mysqli("localhost", "root", "", "dbdesa");
if ($mysqli->connect_errno) {
    echo "Failed: " . $mysqli->connect_error;
    exit();
}
$result = $mysqli->query("SHOW TABLES LIKE 'struktur_desa'");
if($result->num_rows > 0) {
    echo "Table exists.\n";
    $res = $mysqli->query("DESCRIBE struktur_desa");
    while($row = $res->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Table does not exist.\n";
}
