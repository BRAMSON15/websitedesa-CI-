<?php
$mysqli = new mysqli("localhost", "root", "", "dbdesa");
$res = $mysqli->query("DESCRIBE users");
while($row = $res->fetch_assoc()) {
    print_r($row);
}
