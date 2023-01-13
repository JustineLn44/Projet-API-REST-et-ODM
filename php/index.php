<?php
$host = 'db'; //Nom donné dans le docker-compose.yml
$user = 'root';
$password = 'root';
$db = 'restaurant';

$conn = new mysqli($host,$user,$password,$db);
if(!$conn) {echo "Erreur de connexion à MSSQL<br />";}
else{
        echo "Connexion à MSSQL ok<br />";
        mysqli_close($conn);
}

?>