<?php
include 'database.php';

$db = new database();

$klant = $db->deleteKlant($_GET['ID']);

?>