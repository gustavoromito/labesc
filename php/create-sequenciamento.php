<?php
/**
 * Created by PhpStorm.
 * User: gustavoromito
 * Date: 11/8/15
 * Time: 21:39
 */
require('databaseManager.php');

$type= $_POST["type"];
$eletro_path= $_POST["eletro_path"];
//$nucleo_path= $_POST["nucleo_path"];
$pesquisador_id= $_POST["pesquisador_id"];
$animal_id= $_POST["animal_id"];
$date= $_POST["date"];
$obs= $_POST["obs"];
$service= $_POST["service"];
$num_seq= $_POST["num_seq"];
$mapa_path= $_POST["mapa_path"];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//---------------------------------------------------------

/* Prepare an insert statement */
$query = "INSERT INTO `Sequenciamento`(`id`, `type`, `data`, `animal_id`, `pesquisador_id`, `servico_utilizado`, `observacoes`, `eletroferograma`, `mapa_placa`, `numero_sequencias`) VALUES  (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if (!$stmt = $mysqli->prepare($query)) {
    echo returnJSON("100", "Prepare parameters failed: (" . $mysqli->error . ") " . $stmt->error, array());
}

if (!$stmt->bind_param("sssssssss", $type, $date, $animal_id, $pesquisador_id, $service, $obs, $eletro_path, $mapa_path, $num_seq)) {
    echo returnJSON("100", "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}


/* Execute the statement */
if (!$stmt->execute()) {
    echo returnJSON("100", "Execute failed: (" . $stmt->errno . ") " . $stmt->error, array());
    exit;
}
echo returnJSON("200", "Sequenciamento criado com sucesso!", array());
$mysqli->close();
?>