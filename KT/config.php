<?php
$kasutaja = "toomas";
$dbserver = "localhost";
$andmebaas = "soogikoht";
$passwd = "1234";


$uhendus = mysqli_connect($dbserver, $kasutaja, $passwd, $andmebaas);

if (!$uhendus) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
