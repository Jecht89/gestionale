<?php
$db_config = file_get_contents('config.json');
$db_config = json_decode($db_config, true);
echo "<b>DATI CONNESSIONE ERRATI!</b><br>";

if(isset($_GET['errore'])){
    echo $_GET['errore'];
}

echo "<br><br>";
echo "<b>Inerire i dati corretti:</b>";
echo "<form action='errore_connessione.php' method='GET'>";
    echo "<label for='host'><b>host:</b></label><br>";
    echo "<input type='text' id='host' name='host' value='$db_config[host]' required/><br>";
    
    echo "<label for='user'><b>user:</b></label><br>";
    echo "<input type='text' id='user' name='user' value='$db_config[user]' required/><br>";
    
    echo "<label for='password'><b>password:</b></label><br>";
    echo "<input type='text' id='password' name='password' value='$db_config[password]' /><br>";

    echo "<label for='database'><b>database:</b></label><br>";
    echo "<input type='text' id='database' name='database' value='$db_config[database]' required/><br>";

    echo "<input type='submit' name='invia' value='invia'/>";
echo "</form>";

if(isset($_GET['invia'])){
    $dati= ["host"=>$_GET['host'], "user"=>$_GET['user'], "password"=>$_GET['password'],"database"=>$_GET['database']];
    $db_en = json_encode($dati);
    $db_prova = file_put_contents('config.json', $db_en);
    header("location: index.php");
}
?>