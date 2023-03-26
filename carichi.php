<?php include_once('funzioni.php'); 
if(isset($_GET['cliente'])){
    $id_cliente=$_GET['cliente'];

    $sql_dati_cliente = "SELECT * FROM clienti WHERE clienti.id=$id_cliente";
    $result = $connessione->query($sql_dati_cliente);
    $row = $result->fetch(PDO::FETCH_ASSOC);
}

$sql_tabella_temp = " CREATE TABLE IF NOT EXISTS temp_oggetti LIKE oggetti";
$connessione->query($sql_tabella_temp);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Carico</title>
</head>
<body>
    <h1>Carico oggetti</h1>
    <form action="carichi.php" method="GET">
        <input type="submit" formaction="oggetti_cliente.php" name="esci" value="esci"/>
        <select hidden name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        </select>
    </form>
    
    <form action="carichi.php" method="GET" id="insert">    
        <select hidden name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        </select>

        <div>
        <?php
            if(isset($_GET['modifica_oggetto'])){
                echo "<input type='submit' name='registra_modifica' value='registra modifica'/>";
            }else{
                echo "<input type='submit' name='inserisci_oggetto' value='inserisci oggetto'/>";
            };

        ?>
        </div>

        <?php
        if(isset($_GET['temp_oggetti'])){
            $codice_temp=$_GET['temp_oggetti'];
            $sql_datitemp="SELECT * FROM temp_oggetti WHERE temp_oggetti.codice=$codice_temp";
            $oggetto_temp= $connessione->query($sql_datitemp);
            $row_temp = $oggetto_temp->fetch(PDO::FETCH_ASSOC);
        }
        ?>

        <label for="descrizione"><b>Descrizione:</b></label><br>
        <input type="text" id="descrizione" name="descrizione" required
        <?php if(isset($_GET['modifica_oggetto'])){ echo "value='$row_temp[descrizione]'";} ?>/><br>

        <label for="quantita"><b>Quantità:</b></label><br>
        <input type="number" id="quantita" name="quantita" min="1" required
        <?php if(isset($_GET['modifica_oggetto'])){ echo "value='$row_temp[quantita]'";} ?>/><br>

        <label for="prezzo"><b>Prezzo:</b></label><br>
        <input type="number" id="prezzo" name="prezzo" min="0.10" step="0.01" required
        <?php if(isset($_GET['modifica_oggetto'])){ echo "value='$row_temp[prezzo]'";} ?>/><br>

        <?php
            if(isset($_GET['modifica_oggetto'])){
                echo "<select hidden name='temp_oggetti' id='temp_oggetti'>";
                    echo select_temp('temp_oggetti','codice','data_arrivo','temp_oggetti');
                echo "</select>";
            }
        ?>

        <?php
            if(isset($_GET['inserisci_oggetto'])){
                $descrizione=$_GET['descrizione'];
                $quantita=$_GET['quantita'];
                $prezzo=$_GET['prezzo'];
                $iva = $prezzo/2*22/100;
                $prezzo_esposto = $prezzo+$iva;
                $data_arrivo = date("Y-m-d");

                $sql_temp = "INSERT INTO temp_oggetti (id_cliente,descrizione,quantita,
                                        prezzo,prezzo_esposto,data_arrivo)
                            Values('$id_cliente',
                            '$descrizione',
                            '$quantita',
                            '$prezzo',
                            '$prezzo_esposto',
                            '$data_arrivo')";
                $connessione->query($sql_temp); 
            }
            
            if(isset($_GET['registra_modifica'])){;
                $codice_temp=$_GET['temp_oggetti'];
                $descrizione=$_GET['descrizione'];
                $quantita=$_GET['quantita'];
                $prezzo=$_GET['prezzo'];
                $iva = $prezzo/2*22/100;
                $prezzo_esposto = $prezzo+$iva;
                $sql_modifica= "UPDATE temp_oggetti 
                SET descrizione='$descrizione',
                    quantita='$quantita',
                    prezzo='$prezzo',
                    prezzo_esposto='$prezzo_esposto'
                WHERE codice=$codice_temp";
                $connessione->query($sql_modifica);
            }

            if(isset($_GET['elimina_oggetto'])){
                $codice=$_GET['temp_oggetti'];
                $slq_elimina = "DELETE FROM temp_oggetti WHERE codice='$codice'";
                $connessione->query($slq_elimina);
            }
        ?>
    </form>

    <form action="carichi.php" method="GET">
        <select hidden name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        </select>
        <?php
            if(isset($_GET['inserisci_oggetto'])||isset($_GET['registra_modifica'])||isset($_GET['elimina_oggetto'])){
                echo "<input type='submit' name='modifica_oggetto' value='modifica oggetto'/> ";
                echo "<input type='submit' name='elimina_oggetto' value='elimina oggetto'/><br>";
            
                echo "<select size='20' name='temp_oggetti' id='temp_oggetti'>";
                    echo select_temp_oggetti('temp_oggetti','codice','data_arrivo');
                echo "</select>";
            }
        ?>   
    </form>

    <form action="carichi.php" method="GET" id="reg">
        <select hidden name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        </select>
        
        <?php
            if(isset($_GET['inserisci_oggetto'])||isset($_GET['registra_modifica'])||isset($_GET['elimina_oggetto'])){
                echo '<input type="submit" name="registra" value="registra"/>';    
            }

            if(isset($_GET['registra'])){
                $sql_carica_oggetto = "INSERT INTO oggetti (id_cliente,descrizione,quantita,
                                                            prezzo,prezzo_esposto,data_arrivo)
                                        SELECT id_cliente,descrizione,quantita,prezzo,prezzo_esposto,data_arrivo
                                        FROM temp_oggetti"; 
                $connessione->query($sql_carica_oggetto);
                echo "<b>OGGETTO INSERITO! </b>";
                $sql_drop = 'DROP TABLE temp_oggetti'; 
                $connessione->query($sql_drop);
                echo "<input type='submit' formaction='oggetti_cliente.php' name='oggetti_cliente' value='Torna a oggetti cliente'/>";
            }
        ?>
    </form>

</body>
</html>


<?php $connessione = null ?>