<!-- form ricerca cliente
select table clienti

nuovo_cliente
carico -->
<?php 
 include_once('funzioni.php'); 
  ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Gestione Clienti</title>
</head>
<body>
    <h1>Gestione Clienti</h1>
    <h2>LISTA CLIENTI</h2>
    <form action="clienti.php" method="GET">
        <div>
            <input type="submit" formaction="oggetti_cliente.php" name="oggetti_cliente" value="oggetti cliente"/>
            <input type="submit" formaction="modifica_cliente.php" name="modifica_cliente" value="modifica cliente"/>
            <input type="submit" formaction="nuovo_cliente.php" name="nuovo_cliente" value="nuovo cliente"/>   
        </div>
        <select size="10" name='cliente' id='cliente'>
            <?php lista_select('clienti','id','cliente','data_nascita'); ?>
        
        </select>

    </form>

</body>
</html>

<?php $connessione = null ?>