<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studio medico";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO paziente (Nome, Cognome, Pwd)
VALUES ('" . $_REQUEST["nomeI"] . "', '" . $_REQUEST["cognomeI"] . "', '" . $_REQUEST["passwdI"] . "')";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>