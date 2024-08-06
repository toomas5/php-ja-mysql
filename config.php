<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_server = 'localhost';
$db_andmebaas = 'muusikapood';
$db_kasutaja = 'toomas';
$db_salasona = '1234';

$yhendus = mysqli_connect($db_server,$db_kasutaja,$db_salasona,$db_andmebaas);

if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga: ' . mysqli_connect_error());
}

?>
