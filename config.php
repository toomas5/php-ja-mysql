<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_server = 'localhost';
$db_andmebaas = 'muusikapood';
$kasutaja = 'toomas';
$parool = '1234';

$yhendus = mysqli_connect($db_server,$kasutaja,$parool,$db_andmebaas);

if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga: ' . mysqli_connect_error());
}

?>
