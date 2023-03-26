<?php include_once('funzioni.php');

$id_cliente=$_GET['cliente'];

$sql_dati_cliente = "SELECT * FROM clienti WHERE clienti.id=$id_cliente";
$result = $connessione->query($sql_dati_cliente);
$row = $result->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Oggetti in carico</title>
</head>
<body>
    <h1>Oggetti cliente: <?php echo $row['id'] . " | " . $row['nome'] . " " . $row['cognome']; ?></h1>
    <form action="oggetti_cliente.php" method="GET">
        <select hidden name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        </select>

            <input type="submit" formaction="carichi.php" name='carica_oggetti' value="carica oggetti"/>
            <input type="submit" name='modifica_oggetto' value="modifica oggetto"/>
            <input type="submit" name='elimina_oggetto' value="elimina oggetto"/>
            <br>
        <?php
            if(isset($_GET)){
            echo "<select size='20' name='oggetti_cliente' id='oggetti_cliente'>";
                    select_oggetti('oggetti','codice','data_arrivo');
            echo "</select>";
            }
        ?>
        <br>
        <br>
        <?php 
            if(isset($_GET['modifica_oggetto'])){
                echo "<input type='submit' name='registra_modifica' value='registra modifica'/><br>";
            }            
        ?>

        <?php
            if(isset($_GET['modifica_oggetto'])){
                echo "<select hidden name='oggetti_cliente' id='oggetti_cliente'>";
                echo select_temp('oggetti','codice','data_arrivo','oggetti_cliente');
                echo "</select>";
                $codice=$_GET['oggetti_cliente'];
                $sql_dati_oggetto="SELECT * FROM oggetti WHERE oggetti.codice=$codice";
                $oggetto= $connessione->query($sql_dati_oggetto);
                $row_oggetto = $oggetto->fetch(PDO::FETCH_ASSOC);
                

                echo "<label for='codice'><b>Codice:</b></label><br>";
                echo "<input type='text' id='codice' name='codice' disabled ";
                echo "value='$row_oggetto[codice]'/><br>";

                echo "<label for='descrizione'><b>Descrizione:</b></label><br>";
                echo "<input type='text' id='descrizione' name='descrizione' required ";
                echo "value='$row_oggetto[descrizione]'/><br>";

                echo "<label for='quantita'><b>Quantità:</b></label><br>";
                echo "<input type='number' id='quantita' name='quantita' min='1' required ";
                echo "value='$row_oggetto[quantita]'/><br>";
                

                echo "<label for='prezzo'><b>Prezzo:</b></label><br>";
                echo "<input type='number' id='prezzo' name='prezzo' min='0.10' step='0.01' required ";
                echo "value='$row_oggetto[prezzo]'/><br>";
                
            }

            if(isset($_GET['registra_modifica'])){
                echo "<b>Oggetto modificato con successo!</b>";     
                $codice=$_GET['oggetti_cliente'];
                $descrizione=$_GET['descrizione'];
                $quantita=$_GET['quantita'];
                $prezzo=$_GET['prezzo'];
                $iva = $prezzo/2*22/100;
                $prezzo_esposto = $prezzo+$iva;
                $sql_modifica= "UPDATE oggetti 
                SET descrizione='$descrizione',
                    quantita='$quantita',
                    prezzo='$prezzo',
                    prezzo_esposto='$prezzo_esposto'
                WHERE codice=$codice";
                $connessione->query($sql_modifica);
            }
            if(isset($_GET['elimina_oggetto'])){
                echo "<b>Oggetto eliminato con successo!</b>"; 
                $codice=$_GET['oggetti_cliente'];
                $slq_elimina = "DELETE FROM oggetti WHERE codice='$codice'";
                $connessione->query($slq_elimina);
            }
        
        ?>
    </form>

    <a href="clienti.php">
      <input type="submit" name="esci" value="esci"/>
    </a>

</body>
</html>