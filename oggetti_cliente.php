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
    <title>Oggetti in carico</title>
</head>
<body>
    <h1>Oggetti cliente: <?php echo $dati_cliente['id'] . " | " . $dati_cliente['nome'] . " " . $dati_cliente['cognome']; ?></h1>
    <a href="index.php">
      <input type="submit" name="Home" value="Home"/>
    </a>
    <form action="oggetti_cliente.php" method="GET">
        <?php cliente_selezionato('clienti','id','cliente'); ?>

        <input type="submit" formaction="carichi.php" name='carica_oggetti' value="carica oggetti"/>
        <input type="submit" name='modifica_oggetto' value="modifica oggetto"/>
        <input type="submit" name='elimina_oggetto' value="elimina oggetto"/>
        <br>
        <?php
            if(isset($_GET)){
            echo "<select size='20' name='oggetti' id='oggetti'>";
                    lista_oggetti('oggetti','codice','data_arrivo');
            echo "</select>";
            }
        ?>
        <br>
        <?php require_once('oggetto_azioni.php');?>
    </form>

    <a href="clienti.php">
      <input type="submit" name="esci" value="esci"/>
    </a>

</body>
</html>