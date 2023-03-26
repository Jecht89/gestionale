<?php 

// CONNESSIONE DB
$host = "localhost";
$user = "root";
$password = "";
$database = "gestionale";

try {
    $connessione = new PDO ("mysql:host=$host;dbname=$database", $user, $password);
    $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connessione effettuata";
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
    die();
}

function memoria_selezione($table_name,$id_name,$name_select)
{
    if (!$_GET[$name_select]=="")
    {
        GLOBAL $connessione;
        $sql = "SELECT *
                FROM $table_name
                WHERE $id_name=$_GET[$name_select]";
        $result = $connessione->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
       
        echo "<option value='$_GET[$name_select]' selected>";
        echo "Selezionato: " . $row['id'] . ' | ' .  $row['nome'] . ' ' .  $row['cognome'];
        echo "</option>";         
    }
}
function memoria_selezione_temp($table_name,$id_name,$name_select)
{
    if (!$_GET[$name_select]=="")
    {
        GLOBAL $connessione;
        $sql = "SELECT *
                FROM $table_name
                WHERE $id_name=$_GET[$name_select]";
        $result = $connessione->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
       
        echo "<option value='$_GET[$name_select]' selected>";
        echo "Selezionato: " . $row['codice'] . ' || ' .  $row['descrizione'] . ' || ' . $row['prezzo'] . ' || ' 
        . $row['prezzo_esposto'];
        echo "</option>";         
    }
}

function lista_select($table_name,$id_name,$name_select,$date_name)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name";
    $result = $connessione->query($sql);
    memoria_selezione($table_name,$id_name,$name_select);

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $input = $row[$date_name];
        $date = $date = strtotime($input);
        echo "<option value='$row[$id_name]'>";
        echo $row['id'] . ' | ' .  $row['nome'] . ' ' .  $row['cognome'] . ' | ' .  date('d/m/Y', $date);
        echo "</option>";
    }
}

function select_oggetti($table_name,$id_name,$date_name)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name WHERE id_cliente = '$_GET[cliente]'";
    $result = $connessione->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $input = $row[$date_name];
        $date = $date = strtotime($input);
        echo "<option value='$row[$id_name]'>";
        echo $row['codice'] . ' || ' .  $row['descrizione'] . ' || ' . $row['prezzo'] . ' || ' 
            . $row['prezzo_esposto'] . ' || ' .  date('d/m/Y', $date);
        echo "</option>";
    }
}

function select_temp_oggetti($table_name,$id_name,$date_name)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name";
    $result = $connessione->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $input = $row[$date_name];
        $date = $date = strtotime($input);
        echo "<option value='$row[$id_name]'>";
        echo $row['codice'] . ' || ' .  $row['descrizione'] . ' || ' . $row['prezzo'] . ' || ' 
            . $row['prezzo_esposto'] . ' || ' .  date('d/m/Y', $date);
        echo "</option>";
    }
}

function select_temp($table_name,$id_name,$date_name,$name_select)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name";
    $result = $connessione->query($sql);
    memoria_selezione_temp($table_name,$id_name,$name_select);

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $input = $row[$date_name];
        $date = $date = strtotime($input);
        echo "<option value='$row[$id_name]'>";
        echo $row['codice'] . ' || ' .  $row['descrizione'] . ' || ' . $row['prezzo'] . ' || ' 
            . $row['prezzo_esposto'] . ' || ' .  date('d/m/Y', $date);
        echo "</option>";
    }
}

?>

  