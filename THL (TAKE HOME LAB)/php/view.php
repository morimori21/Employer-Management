<?php
session_start();
include 'connect.php';

$query = "SELECT * FROM employee";
$result = $conn->query($query);

$employees = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $employees[] = $row;
    }
}?>
