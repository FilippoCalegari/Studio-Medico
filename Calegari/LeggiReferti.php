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

$sql = "SELECT ID_paziente FROM paziente WHERE (Nome='" . $_REQUEST["nomeI"] . "' and Cognome='" . $_REQUEST["cognomeI"] . "' and Pwd='" . $_REQUEST["passwdI"] . "')";
$result = $conn->query($sql);
if ($result->num_rows == 1) { // paziente riconosciuto
    $row = $result->fetch_assoc();
    $ID_paziente = $row["ID_paziente"]; // setto ID_paziente per le prox interrog
    $sql = "SELECT Data_ref, Descrizione FROM referto WHERE (ID_paziente=" . $ID_paziente . ")";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { // referti ?
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "data: " . $row["Data_ref"] . " - Descrizione: " . $row["Descrizione"] . "<br>";
        }
    } else {
        echo "Caro/a " . $_REQUEST["nomeI"] . " Nessun referto!";
    }

} else {
    echo "Paziente non riconosciuto!";
}
$conn->close();
