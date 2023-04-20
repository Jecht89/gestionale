<?php require_once('funzioni.php'); 
if(isset($_GET['cliente'])){
    $dati_cliente=dati_cliente();
}
if(isset($_GET['temp_oggetti']) && !isset($_GET['temp_oggetti'])==null){
    $dati_oggetto_temp= dati_oggetto('temp_oggetti',$_GET['temp_oggetti']);
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

        <?php cliente_selezionato('clienti','id','cliente'); ?>

    </form>
    
    <form action="carichi.php" method="GET" id="insert">

        <?php cliente_selezionato('clienti','id','cliente'); ?>

        <div>
            <?php
                if(isset($_GET['temp_modifica_oggetto']) && !isset($_GET['temp_oggetti'])==null){
                    echo "<input type='submit' name='temp_registra_modifica' value='registra modifica'/>";
                }else{
                    echo "<input type='submit' name='temp_inserisci_oggetto' value='inserisci oggetto'/>";
                };

            ?>
        </div>

        <label for="descrizione"><b>Descrizione:</b></label><br>
        <input type="text" id="descrizione" name="descrizione" required
        <?php if(isset($_GET['temp_modifica_oggetto']) && !isset($_GET['temp_oggetti'])==null){
                    echo "value='$dati_oggetto_temp[descrizione]'";
                } ?>/><br>

        <label for="quantita"><b>Quantità:</b></label><br>
        <input type="number" id="quantita" name="quantita" min="1" required
        <?php if(isset($_GET['temp_modifica_oggetto']) && !isset($_GET['temp_oggetti'])==null){
                    echo "value='$dati_oggetto_temp[quantita]'";
                } ?>/><br>

        <label for="prezzo"><b>Prezzo:</b></label><br>
        <input type="number" id="prezzo" name="prezzo" min="0.10" step="0.01" required
        <?php if(isset($_GET['temp_modifica_oggetto']) && !isset($_GET['temp_oggetti'])==null){
                    echo "value='$dati_oggetto_temp[prezzo]'";
                } ?>/><br>

        <?php
            if(isset($_GET['temp_modifica_oggetto'])){
                oggetto_selezionato('temp_oggetti','codice','temp_oggetti');
            }
            
            require_once('oggetto_azioni.php');
        ?>
    </form>

    <form action="carichi.php" method="GET">

        <?php
            cliente_selezionato('clienti','id','cliente');

            if(isset($_GET['temp_inserisci_oggetto'])||isset($_GET['temp_registra_modifica'])||isset($_GET['temp_elimina_oggetto'])||isset($_GET['temp_modifica_oggetto'])){
                echo "<input type='submit' name='temp_modifica_oggetto' value='modifica oggetto'/> ";
                echo "<input type='submit' name='temp_elimina_oggetto' value='elimina oggetto'/><br>";
                
                if((isset($_GET['temp_oggetti'])==NULL&&isset($_GET['temp_modifica_oggetto'])) || (isset($_GET['temp_oggetti'])==NULL&&isset($_GET['temp_elimina_oggetto']))){
                    echo "<b>ATTENZIONE! non hai selezionato un oggetto!</b><br>";
                }

                echo "<select size='20' name='temp_oggetti' id='temp_oggetti'>";
                    echo lista_oggetti('temp_oggetti','codice','data_arrivo');
                echo "</select>";
                echo "<br>";
                echo '<input type="submit" name="temp_registra" value="registra"/>';
            }
            
            if(isset($_GET['temp_registra'])){
                echo "<input type='submit' formaction='oggetti_cliente.php' name='oggetti_cliente' value='Torna a oggetti cliente'/>";
            }
        ?>   
    </form>

</body>
</html>


<?php $connessione = null ?>