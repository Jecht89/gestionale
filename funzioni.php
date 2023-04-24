<?php 

$db_config = file_get_contents('config.json');
$db_config = json_decode($db_config, true);
// CONNESSIONE DB
$host = $db_config["host"];
$user = $db_config["user"];
$password = $db_config["password"];
$database = $db_config["database"];
try {
    $connessione = new PDO ("mysql:host=$host;dbname=$database", $user, $password);
    $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connessione effettuata";
} catch (PDOException $e) {
    $errore = "Errore: " . $e->getMessage();
    header("location: errore_connessione.php?errore=" ."$errore");
    die();
}

function dati_cliente()
{
    GLOBAL $connessione;
    $sql = "SELECT *
            FROM clienti
            WHERE id = $_GET[cliente]";
    $result = $connessione->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return [
        'id' => $row['id'],
        'nome' => $row['nome'],
        'cognome' => $row['cognome'],
        'data_nascita' => $row['data_nascita'],
        'sesso' => $row['sesso'],
        'luogo_nascita' => $row['luogo_nascita'],
        'cod_fiscale' => $row['cod_fiscale'],
        'residenza' => $row['residenza'],
        'citta' => $row['citta'],
        'documento' => $row['documento'],
        'nr_documento' => $row['nr_documento'],
        'emissione' => $row['emissione'],
        'telefono' => $row['telefono'],
        'email' => $row['email']
    ];
}

function dati_oggetto($table_name,$input_name)
{
    GLOBAL $connessione;
    $sql = "SELECT *
    FROM $table_name
    WHERE codice = $input_name";
    $result = $connessione->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return [
        'codice' => $row['codice'],
        'id_cliente' => $row['id_cliente'],
        'descrizione' => $row['descrizione'],
        'quantita' => $row['quantita'],
        'prezzo' => $row['prezzo'],
        'prezzo_esposto' => $row['prezzo_esposto'],
        'data_arrivo' => $row['data_arrivo']
    ];
}

function cliente_selezionato($table_name,$id_name,$name_select)
{
    if (!isset($_GET[$name_select])==""){
        GLOBAL $connessione;
        $sql = "SELECT *
                FROM $table_name
                WHERE $id_name=$_GET[$name_select]";
        $result = $connessione->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        echo "<select hidden name='$name_select' id='$name_select'>";
            echo "<option value='$_GET[$name_select]' selected>";
            echo "Selezionato: " . $row['id'] . ' | ' .  $row['nome'] . ' ' .  $row['cognome'];
            echo "</option>";
        echo "</select>";        
    }
}

function oggetto_selezionato($table_name,$id_name,$name_select)
{
    if (!isset($_GET[$name_select])==""){
        GLOBAL $connessione;
        $sql = "SELECT *
                FROM $table_name
                WHERE $id_name=$_GET[$name_select]";
        $result = $connessione->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        echo "<select hidden name='$name_select' id='$name_select'>";
            echo "<option value='$_GET[$name_select]' selected>";
            echo "Selezionato: " . $row['codice'] . ' || ' .  $row['descrizione'] . ' || ' . $row['prezzo'] . ' || ' . $row['prezzo_esposto'];
            echo "</option>";
        echo "</select>";        
    }
}

function lista_clienti($table_name,$id_name,$date_name)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name";
    $result = $connessione->query($sql);
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $input = $row[$date_name];
        $date = $date = strtotime($input);
        echo "<option value='$row[$id_name]'>";
        echo $row['id'] . ' | ' .  $row['nome'] . ' ' .  $row['cognome'] . ' | ' .  date('d/m/Y', $date);
        echo "</option>";
    }
}

function lista_oggetti($table_name,$id_name,$date_name)
{
    GLOBAL $connessione;
    $sql = "SELECT * FROM $table_name WHERE id_cliente = '$_GET[cliente]'";
    $result = $connessione->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $input = $row[$date_name];
        $date = $date = strtotime($input);
        echo "<option value='$row[$id_name]'>";
        echo $row['codice'] . ' || ' .  $row['descrizione'] . ' || ' .  $row['quantita'] . ' || ' . $row['prezzo'] . ' || ' 
            . $row['prezzo_esposto'] . ' || ' .  date('d/m/Y', $date);
        echo "</option>";
    }
}


?> 