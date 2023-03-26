<?php include_once('funzioni.php');
$id_cliente=$_GET['cliente'];

$sql_dati_cliente = "SELECT * FROM clienti WHERE clienti.id=$id_cliente";
$result = $connessione->query($sql_dati_cliente);
$row = $result->fetch(PDO::FETCH_ASSOC);

$nome = $row['nome'];
$cognome = $row['cognome'];
$data_nascita = $row['data_nascita'];
$sesso = $row['sesso'];
$luogo_nascita = $row['luogo_nascita'];
$cod_fiscale = $row['cod_fiscale'];
$residenza = $row['residenza'];
$citta = $row['citta'];
$documento = $row['documento'];
$nr_documento = $row['nr_documento'];
$emissione = $row['emissione'];
$telefono = $row['telefono'];
$email = $row['email'];

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Modifca Cliente</title>
</head>
<body>
    <h3>Modifica Cliente</h3>

    <form action="modifica_cliente.php" method="GET">
        <select hidden name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        </select>

        <label for="nome"><b>Nome:</b></label><br>
        <?php echo"<input type='text' id='nome' name='nome' value='$nome' required/><br>"; ?>

        <label for="cognome"><b>Cognome:</b></label><br>
        <?php echo"<input type='text' id='cognome' name='cognome' value='$cognome' required/><br>";?>

        <label for="data_nascita"><b>Data di nascita:</b></label><br>
        <?php echo"<input type='date' id='data_nascita' name='data_nascita' value='$data_nascita' required/><br>";?>

        <label for="sesso"><b>Sesso:</b></label><br>
        <?php
            if($sesso=='Male'){
                echo "<input type='radio' name='sesso' value='Male' checked required/>";
                echo "<label for='sesso'>Maschio</label><br>";
                echo "<input type='radio' name='sesso' value='Female' required/>";
                echo "<label for='sesso'>Femmina</label><br>";    
            }else{
                echo "<input type='radio' name='sesso' value='Male' required/>";
                echo "<label for='sesso'>Maschio</label><br>";
                echo "<input type='radio' name='sesso' value='Female' checked required/>";
                echo "<label for='sesso'>Femmina</label><br>";
            }      

        ?>

        <label for="luogo_nascita"><b>Luogo di Nascita:</b></label><br>
        <?php echo "<input type='text' id='luogo_nascita' name='luogo_nascita' value='$luogo_nascita' required/><br>";?>

        <label for="cod_fiscale"><b>Codice Fiscale:</b></label><br>
        <?php echo "<input type='text' id='cod_fiscale' name='cod_fiscale' maxlength='16' value='$cod_fiscale' required style='text-transform:uppercase'/><br>";?>

        <label for="residenza"><b>Residenza:</b></label><br>
        <?php echo "<input type='text' id='residenza' name='residenza' value='$residenza' required/><br>";?>

        <label for="citta"><b>Città:</b></label><br>
        <?php echo "<input type='text' id='citta' name='citta' value='$citta' required/><br>";?>

        <label for="documento"><b>Documento:</b></label><br>
        <?php echo "<input type='text' id='documento' name='documento' value='$documento' required/><br>";?>

        <label for="nr_documento"><b>Numero Documento:</b></label><br>
        <?php echo "<input type='text' id='nr_documento' name='nr_documento' value='$nr_documento' required/><br>";?>

        <label for="emissione"><b>Data emissione:</b></label><br>
        <?php echo "<input type='date' id='emissione' name='emissione' value='$emissione' required/><br>";?>

        <label for="telefono"><b>Telefono:</b></label><br>
        <?php echo "<input type='tel' id='telefono' name='telefono' value='$telefono'/><br>";?>

        <label for="email"><b>Email:</b></label><br>
        <?php echo "<input type='email' id='email' name='email' value='$email'/><br><br>";?>


        <?php
        if(!isset($_GET['modifica'])){

            echo '<input type="submit" name="modifica" value="modifica"/>';
        }else{
            $nome = $_GET['nome'];
            $cognome = $_GET['cognome'];
            $data_nascita = $_GET['data_nascita'];
            $sesso = $_GET['sesso'];
            $luogo_nascita = $_GET['luogo_nascita'];
            $cod_fiscale = $_GET['cod_fiscale'];
            $residenza = $_GET['residenza'];
            $citta = $_GET['citta'];
            $documento = $_GET['documento'];
            $nr_documento = $_GET['nr_documento'];
            $emissione = $_GET['emissione'];
            $telefono = $_GET['telefono'];
            $email = $_GET['email'];
            
            $sql_update_cliente = "UPDATE clienti
            SET nome='$nome',
                cognome='$cognome',
                data_nascita='$data_nascita',
                sesso='$sesso',
                luogo_nascita='$luogo_nascita',
                cod_fiscale='$cod_fiscale',
                residenza='$residenza',
                citta='$citta',
                documento='$documento',
                nr_documento='$nr_documento',
                emissione='$emissione',
                telefono='$telefono',
                email='$email'
            WHERE id=$id_cliente";
            $connessione->query($sql_update_cliente);

            echo "<b>CLIENTE MODIFICATO CON SUCCESSO! </b>";
            echo "</form>";
            echo '<a href="clienti.php">';
                echo '<input type="submit" name="gestione_clienti" value="Torna a gestione clienti"/>';
            echo '</a>';            
        }
        ?>
    </form>
<a href="clienti.php">
    <input type="submit" name="annulla" value="annulla"/>
</a>
    
</body>
</html>