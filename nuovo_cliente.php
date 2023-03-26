<?php include_once('funzioni.php'); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Nuovo Cliente</title>
</head>
<body>
    <h2>Nuovo Cliente</h2>
    <form action="nuovo_cliente.php" method="GET">

        <label for="nome"><b>Nome:</b></label><br>
        <input type="text" id="nome" name="nome" required/><br>

        <label for="cognome"><b>Cognome:</b></label><br>
        <input type="text" id="cognome" name="cognome" required/><br>

        <label for="data_nascita"><b>Data di nascita:</b></label><br>
        <input type="date" id="data_nascita" name="data_nascita" required/><br>

        <label for="sesso"><b>Sesso:</b></label><br>
        <input type="radio" name="sesso" value="Male" required/>
        <label for="sesso">Maschio</label><br>
        <input type="radio" name="sesso" value="Female" required/>
        <label for="sesso">Femmina</label><br>

        <label for="luogo_nascita"><b>Luogo di Nascita:</b></label><br>
        <input type="text" id="luogo_nascita" name="luogo_nascita" required/><br>

        <label for="cod_fiscale"><b>Codice Fiscale:</b></label><br>
        <input type="text" id="cod_fiscale" name="cod_fiscale" maxlength="16" required/><br>
        
        <label for="residenza"><b>Residenza:</b></label><br>
        <input type="text" id="residenza" name="residenza" required/><br>
        
        <label for="citta"><b>Città:</b></label><br>
        <input type="text" id="citta" name="citta" required/><br>
        
        <label for="documento"><b>Documento:</b></label><br>
        <input type="text" id="documento" name="documento" required/><br>
        
        <label for="nr_documento"><b>Numero Documento:</b></label><br>
        <input type="text" id="nr_documento" name="nr_documento" required/><br>
        
        <label for="emissione"><b>Data emissione:</b></label><br>
        <input type="date" id="emissione" name="emissione" required/><br>
        
        <label for="telefono"><b>Telefono:</b></label><br>
        <input type="tel" id="telefono" name="telefono"/><br>
        
        <label for="email"><b>Email:</b></label><br>
        <input type="email" id="email" name="email"/><br><br>

        
        <?php
        if(!isset($_GET['registra'])){
      
            echo '<input type="submit" name="registra" value="registra"/>';
            echo '</form>';
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
            
            $sql_nuovo_cliente = "INSERT INTO clienti (nome,cognome,data_nascita,sesso,luogo_nascita,cod_fiscale,
                                  residenza,citta,documento,nr_documento,emissione,telefono,email)
            VALUES('$nome',
                   '$cognome',
                   '$data_nascita',
                   '$sesso',
                   '$luogo_nascita',
                   '$cod_fiscale',
                   '$residenza',
                   '$citta',
                   '$documento',
                   '$nr_documento',
                   '$emissione ',
                   '$telefono',
                   '$email')";
            $connessione->query($sql_nuovo_cliente);

            echo "<b>CLIENTE REGISTRATO CON SUCCESSO!</b>";
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


<?php $connessione = null ?>