<?php
$mysqli = new mysqli("localhost", "root", "", "dbdesa");
$result = $mysqli->query("SELECT * FROM users");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
