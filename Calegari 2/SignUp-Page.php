<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<h2>AMBULATORIO MEDICO: REGISTRAZIONE</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="nomeI">Nome:</label><br>
  <input type="text" id="nomeI" name="nomeI" value=""><br>

  <label for="cognomeI">Cognome:</label><br>
  <input type="text" id="cognomeI" name="cognomeI" value=""><br>

  <label for="passwdI">Password:</label><br>
  <input type="password" id="passwdI" name="passwdI" minlength="3"><br><br>

  <input type="submit" value="REGISTRATI">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studio medico";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Protezione contro SQL injection
    $nome = $conn->real_escape_string($_POST["nomeI"]);
    $cognome = $conn->real_escape_string($_POST["cognomeI"]);
    $pwd = $conn->real_escape_string($_POST["passwdI"]);

    $sql = "INSERT INTO paziente (Nome, Cognome, Pwd)
    VALUES ('" . $_REQUEST["nomeI"] . "', '" . $_REQUEST["cognomeI"] . "', '" . $_REQUEST["passwdI"] . "')";

    if ($conn->query($sql) === true) {
        echo "Registrazione avvenuta con successo!";
    } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>
