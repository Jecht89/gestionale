<?php require_once('funzioni.php'); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding:5px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>

    <title>Oggetti</title>
</head>
<body>
<h3>OGGETTI</h3>
<a href="index.php">
      <input type="submit" name="Home" value="Home"/>
</a>

<form action="oggetti.php" method="GET">
    <label for="ricerca"><b>Ricerca Oggetto:</b></label>
    <input type="search" id="ricerca_oggetto" name="ricerca_oggetto">
    <input type="submit">
    <br>
    <table>
        <tr>
            <th>Codice Articolo</th>
            <th>ID Cliente</th>
            <th>Descrizione</th>
            <th>Quantità</th>
            <th>Prezzo Esposto</th>
            <th>Data Arrivo</th>
        </tr>
        <?php require_once('oggetto_azioni.php'); ?>
    </table>
</form>

</body>
</html>


<?php $connessione = null ?>