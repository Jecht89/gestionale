<?php 
require_once('funzioni.php');

switch (isset($_GET)){
    case isset($_GET['registra']):    
        $sql_nuovo_cliente = "INSERT INTO clienti (nome,cognome,data_nascita,sesso,luogo_nascita,cod_fiscale,
                            residenza,citta,documento,nr_documento,emissione,telefono,email)
        VALUES('$_GET[nome]',
            '$_GET[cognome]',
            '$_GET[data_nascita]',
            '$_GET[sesso]',
            '$_GET[luogo_nascita]',
            '$_GET[cod_fiscale]',
            '$_GET[residenza]',
            '$_GET[citta]',
            '$_GET[documento]',
            '$_GET[nr_documento]',
            '$_GET[emissione]',
            '$_GET[telefono]',
            '$_GET[email]')";
        $connessione->query($sql_nuovo_cliente);
        
        echo "<br>";
        echo "<b>CLIENTE REGISTRATO CON SUCCESSO!</b>";
    break;

    case isset($_GET['modifica']):
        $sql_update_cliente = "UPDATE clienti
        SET nome='$_GET[nome]',
            cognome='$_GET[cognome]',
            data_nascita='$_GET[data_nascita]',
            sesso='$_GET[sesso]',
            luogo_nascita='$_GET[luogo_nascita]',
            cod_fiscale='$_GET[cod_fiscale]',
            residenza='$_GET[residenza]',
            citta='$_GET[citta]',
            documento='$_GET[documento]',
            nr_documento='$_GET[nr_documento]',
            emissione='$_GET[emissione]',
            telefono='$_GET[telefono]',
            email='$_GET[email]'
        WHERE id=$dati_cliente[id]";
        $connessione->query($sql_update_cliente);
        echo "<br>";
        echo "<b>CLIENTE MODIFICATO CON SUCCESSO! </b>";
    break;

    case isset($_GET['elimina_cliente']):
        if (isset($_GET['cliente'])==NULL){
            echo "<b>ATTENZIONE! non hai selezionato un cliente!</b>";
            break;
        }else{
            $slq_elimina = "DELETE FROM clienti WHERE id='$_GET[cliente]'";
            $connessione->query($slq_elimina);
        break;
    }
}

?>