<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ambulatorio Medico</title>
</head>
<body>

<h2>AMBULATORIO MEDICO</h2>

<form id="loginForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="nomeI">Nome:</label><br>
  <input type="text" id="nomeI" name="nomeI" value=""><br>

  <label for="cognomeI">Cognome:</label><br>
  <input type="text" id="cognomeI" name="cognomeI" value=""><br>

  <label for="passwdI">Password:</label><br>
  <input type="password" id="passwdI" name="passwdI" minlength="3"><br><br>

  <label for="cmbSelect">Seleziona tipo utente:</label><br>
  <select id="cmbSelect" name="Select">
    <option value="0">Seleziona utente</option>
    <option value="1">Dottore</option>
    <option value="2">Paziente</option>
  </select>
  <br><br>

  <?php
  if (!isset($_SESSION["user"])) {
  ?>

  <input type="submit" value="ACCEDI">
  <input type="submit" formaction="./SignUp-Page.php" value="REGISTRATI">
  
  <?php
  } else {
  ?>

  <input type="submit" formaction="./SignUp-Page.php" value="LOGOUT">

  <?php
  }
  ?>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studio medico";

    // Crea la connessione
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Prepara ed esegui la query
    $nome = $conn->real_escape_string($_POST["nomeI"]);
    $cognome = $conn->real_escape_string($_POST["cognomeI"]);
    $pwd = $conn->real_escape_string($_POST["passwdI"]);

    $sql = "SELECT ID_paziente FROM paziente WHERE Nome='$nome' AND Cognome='$cognome' AND Pwd='$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) { // Paziente riconosciuto
        $_SESSION["user"] = $nome;
        $row = $result->fetch_assoc();
        $ID_paziente = $row["ID_paziente"];

        $sql = "SELECT Data_ref, Descrizione FROM referto WHERE ID_paziente=$ID_paziente";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { // Referti trovati
            echo "<h3>Referti disponibili:</h3>";
            while ($row = $result->fetch_assoc()) {
                echo "Data: " . $row["Data_ref"] . " - Descrizione: " . $row["Descrizione"] . "<br>";
            }
        } else {
            echo "Caro/a $nome, nessun referto trovato!";
        }
    } else {
        echo "Paziente non riconosciuto!";
    }

    $conn->close();
}
?>
</body>
</html>
