<?php require_once('funzioni.php'); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Gestione Clienti</title>
</head>
<body>
    <h1>Gestione Clienti</h1>
    <h2>LISTA CLIENTI</h2>
    <a href="index.php">
      <input type="submit" name="Home" value="Home"/>
    </a>
    <form action="clienti.php" method="GET">
        <div>
            <input type="submit" formaction="oggetti_cliente.php" name="oggetti" value="oggetti cliente"/>
            <input type="submit" formaction="nuovo_cliente.php" name="nuovo_cliente" value="nuovo cliente"/>  
            <input type="submit" formaction="modifica_cliente.php" name="modifica_cliente" value="modifica cliente"/>
            <input type="submit" name="elimina_cliente" value="elimina cliente"/>
 
        </div>
        <select size="10" name='cliente' id='cliente'>
            <?php lista_clienti('clienti','id','data_nascita'); ?>
        
        </select>
    
    </form>
    <?php require_once('cliente_azioni.php'); ?> 
</body>
</html>

<?php $connessione = null?>