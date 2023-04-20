<?php require_once('funzioni.php');

if (isset($_GET['modifica_oggetto'])){
    if (!isset($_GET['oggetti'])==null){
        $dati_oggetto = dati_oggetto('oggetti',$_GET['oggetti']);
    }
}

switch (isset($_GET)){    
    case isset($_GET['modifica_oggetto']):
        if (isset($_GET['oggetti'])==null){
            echo "Selezionare un oggetto!";
            break;
        }else{
            echo oggetto_selezionato('oggetti','codice','oggetti');
            
            echo "<input type='submit' name='registra_modifica' value='registra modifica'/><br>";
            
            echo "<label for='codice'><b>Codice:</b></label><br>";
            echo "<input type='text' id='codice' name='codice' disabled ";
            echo "value='$dati_oggetto[codice]'/><br>";

            echo "<label for='descrizione'><b>Descrizione:</b></label><br>";
            echo "<input type='text' id='descrizione' name='descrizione' required ";
            echo "value='$dati_oggetto[descrizione]'/><br>";

            echo "<label for='quantita'><b>Quantità:</b></label><br>";
            echo "<input type='number' id='quantita' name='quantita' min='1' required ";
            echo "value='$dati_oggetto[quantita]'/><br>";
            

            echo "<label for='prezzo'><b>Prezzo:</b></label><br>";
            echo "<input type='number' id='prezzo' name='prezzo' min='0.10' step='0.01' required ";
            echo "value='$dati_oggetto[prezzo]'/><br>";      

        break;
        }

    case isset($_GET['registra_modifica']):
        echo "<b>Oggetto codice: " . $_GET['oggetti'] . " modificato con successo!</b>";
        $iva = $_GET['prezzo']/2*22/100;
        $prezzo_esposto = $_GET['prezzo']+$iva;
        $sql_modifica= "UPDATE oggetti 
        SET descrizione='$_GET[descrizione]',
            quantita='$_GET[quantita]',
            prezzo='$_GET[prezzo]',
            prezzo_esposto='$prezzo_esposto'
        WHERE codice=$_GET[oggetti]";
        $connessione->query($sql_modifica);
    break;

    case isset($_GET['elimina_oggetto']):
        if (isset($_GET['oggetti'])==null){
            echo "Selezionare un oggetto!";
            break;
        }else{
        echo "<b>Oggetto eliminato con successo!</b>"; 
        $slq_elimina = "DELETE FROM oggetti WHERE codice='$_GET[oggetti]'";
        $connessione->query($slq_elimina);
        break;
        }

    case isset($_GET['ricerca_oggetto']):
        $sql = "SELECT * FROM oggetti WHERE descrizione LIKE '%$_GET[ricerca_oggetto]%'";
        $result = $connessione->query($sql);
         
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $input = $row['data_arrivo'];
            $date = $date = strtotime($input);
    
            echo "<tr>";
                echo "<td>$row[codice]</td>";
                echo "<td>$row[id_cliente]</td>";
                echo "<td>$row[descrizione]</td>";
                echo "<td>$row[quantita]</td>";
                echo "<td>$row[prezzo_esposto] €</td>";
                echo "<td>" . date('d/m/Y', $date) . "</td>";
            echo "</tr>";
        }
    break;

//------------------------------- TABELLA TEMPORANEA ------------------------------------------------------------
    case isset($_GET['temp_inserisci_oggetto']):
        $prezzo=$_GET['prezzo'];
        $iva = $prezzo/2*22/100;
        $prezzo_esposto = $prezzo+$iva;
        $data_arrivo = date("Y-m-d");

        $sql_temp = "INSERT INTO temp_oggetti (id_cliente,descrizione,quantita,
                                prezzo,prezzo_esposto,data_arrivo)
                    Values('$dati_cliente[id]',
                    '$_GET[descrizione]',
                    '$_GET[quantita]',
                    '$prezzo',
                    '$prezzo_esposto',
                    '$data_arrivo')";
        $connessione->query($sql_temp); 
    break;

    case isset($_GET['temp_registra_modifica']):

        $prezzo=$_GET['prezzo'];
        $iva = $prezzo/2*22/100;
        $prezzo_esposto = $prezzo+$iva;
        $sql_modifica= "UPDATE temp_oggetti 
        SET descrizione='$_GET[descrizione]',
            quantita='$_GET[quantita]',
            prezzo='$prezzo',
            prezzo_esposto='$prezzo_esposto'
        WHERE codice=$_GET[temp_oggetti]";
        $connessione->query($sql_modifica);
    break;
    
    
    case isset($_GET['temp_elimina_oggetto']):
        if (isset($_GET['temp_oggetti'])==null){
            break;
        }else{
            $codice=$_GET['temp_oggetti'];
            $slq_elimina = "DELETE FROM temp_oggetti WHERE codice='$codice'";
            $connessione->query($slq_elimina);
        break;
        }

    case isset($_GET['temp_registra']):
        $sql_carica_oggetto = "INSERT INTO oggetti (id_cliente,descrizione,quantita,
                                                    prezzo,prezzo_esposto,data_arrivo)
                                SELECT id_cliente,descrizione,quantita,prezzo,prezzo_esposto,data_arrivo
                                FROM temp_oggetti"; 
        $connessione->query($sql_carica_oggetto);
        echo "<b>OGGETTI INSERITI! </b>";
        $sql_drop = 'DROP TABLE temp_oggetti'; 
        $connessione->query($sql_drop);
    break;
//--------------------------------------------------------------------------------------------------------

}


?>