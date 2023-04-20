<?php require_once('funzioni.php');

if(isset($_GET['cliente'])==NULL){
    echo "<br>";
    echo "<b>ATTENZIONE! non hai selezionato un cliente!</b> ";
    echo "<a href='clienti.php'>
            <input type='submit' name='indietro' value='Torna indietro'/>
        </a>";
    exit;
}else{
    $dati_cliente = dati_cliente();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Modifca Cliente</title>
</head>
<body>
    <h3>Modifica Cliente</h3>

    <form action="modifica_cliente.php" method="GET">

        <?php cliente_selezionato('clienti','id','cliente'); ?>

        <label for="nome"><b>Nome:</b></label><br>
        <?php echo"<input type='text' id='nome' name='nome' value='$dati_cliente[nome]' required/><br>"; ?>

        <label for="cognome"><b>Cognome:</b></label><br>
        <?php echo"<input type='text' id='cognome' name='cognome' value='$dati_cliente[cognome]' required/><br>";?>

        <label for="data_nascita"><b>Data di nascita:</b></label><br>
        <?php echo"<input type='date' id='data_nascita' name='data_nascita' value='$dati_cliente[data_nascita]' required/><br>";?>

        <label for="sesso"><b>Sesso:</b></label><br>
        <?php
            if($dati_cliente['sesso']=='Male'){
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
        <?php echo "<input type='text' id='luogo_nascita' name='luogo_nascita' value='$dati_cliente[luogo_nascita]' required/><br>";?>

        <label for="cod_fiscale"><b>Codice Fiscale:</b></label><br>
        <?php echo "<input type='text' id='cod_fiscale' name='cod_fiscale' maxlength='16' value='$dati_cliente[cod_fiscale]' required style='text-transform:uppercase'/><br>";?>

        <label for="residenza"><b>Residenza:</b></label><br>
        <?php echo "<input type='text' id='residenza' name='residenza' value='$dati_cliente[residenza]' required/><br>";?>

        <label for="citta"><b>Città:</b></label><br>
        <?php echo "<input type='text' id='citta' name='citta' value='$dati_cliente[citta]' required/><br>";?>

        <label for="documento"><b>Documento:</b></label><br>
        <?php echo "<input type='text' id='documento' name='documento' value='$dati_cliente[documento]' required/><br>";?>

        <label for="nr_documento"><b>Numero Documento:</b></label><br>
        <?php echo "<input type='text' id='nr_documento' name='nr_documento' value='$dati_cliente[nr_documento]' required/><br>";?>

        <label for="emissione"><b>Data emissione:</b></label><br>
        <?php echo "<input type='date' id='emissione' name='emissione' value='$dati_cliente[emissione]' required/><br>";?>

        <label for="telefono"><b>Telefono:</b></label><br>
        <?php echo "<input type='tel' id='telefono' name='telefono' value='$dati_cliente[telefono]'/><br>";?>

        <label for="email"><b>Email:</b></label><br>
        <?php echo "<input type='email' id='email' name='email' value='$dati_cliente[email]'/><br><br>";?>

        <input type='submit' name='modifica' value='modifica'/>
        
        <?php require_once('cliente_azioni.php'); ?>


    </form>
    <a href='clienti.php'>
        <input type='submit' name='gestione_clienti' value='Torna a gestione clienti'/>
    </a>
    
</body>
</html>