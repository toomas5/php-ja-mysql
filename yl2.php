<?php include('config.php'); ?>
<!doctype html>
<!--
               yl02
              toomas
              07/06/24
-->

<html lang="en">

<head>
    <title>2</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<?php
$ots1 = "SELECT * FROM albumid LIMIT 10";
$val1 = $yhendus->query($ots1);
echo "<h3>Albumid</h3>";
while($rida = mysqli_fetch_array($val1)){
	echo ' '.$rida[1].' - '.$rida[2].' | '.$rida[3].' | '.$rida[4].'€<br>';
}

$ots2 = "SELECT artist, album FROM albumid ORDER BY artist ASC LIMIT 10";
$val2 = $yhendus->query($ots2);
echo "<h3>Kasvavalt artisti järgi </h3>";
while($rida = mysqli_fetch_array($val2)){
	echo ' '.$rida["0"].' - '.$rida[1].'<br>';
}

$ots3 = "SELECT artist, album FROM albumid WHERE aasta >= 2010";
$val3 = $yhendus->query($ots3);
echo "<h3>Uuemad kui 2010</h3>";
while($rida = mysqli_fetch_array($val3)){
	echo ' '.$rida[0].' - '.$rida[1].'<br>';
}

$ots4 = "SELECT COUNT(DISTINCT album) AS alb_arv, AVG(hind) AS kesk_hind, SUM(hind) AS summa FROM albumid";
$val4 = $yhendus->query($ots4);
echo "<h3>Erinevate albumite arv, keskmine hind ja summa</h3>";
while($rida = mysqli_fetch_array($val4)){
    echo "Erinevate albumite arv: " . $rida["alb_arv"] . "<br>";
    echo "Keskmine hind: " . round($rida["kesk_hind"],2) . "€<br>";
    echo "Summa: " . $rida["summa"] . "€<br>";
}

$ots5 = "SELECT album FROM albumid ORDER BY aasta ASC LIMIT 1";
$val5 = $yhendus->query($ots5);
echo "<h3>Kõige vanem album</h3>";
while($rida = mysqli_fetch_array($val5)){
	echo ' '.$rida[0].'<br>';
}

$ots6 = "SELECT * FROM albumid WHERE hind > (SELECT AVG(hind) FROM albumid)";
$val6 = $yhendus->query($ots6);
echo "<h3>Hind on keskmisest suurem</h3>";
while($rida = mysqli_fetch_array($val6)){
	echo ' '.$rida[1].' - '.$rida[2].' | '.$rida[4].'€<br>';
}
echo "<".'b'."r".'>';
?>

<form method="get" action="">
<select name="otsi2">
<option value='artist'>Artist</option>
<option value='album'>Album</option>
</select>
 <input type="text" name="otsi">
 <input type="submit" value="Otsi">
</form>

<?php
if (!empty($_GET['otsi'])) {
 //kasutaja tekst vormist
 $otsi = $_GET['otsi'];
 $otsi2 = $_GET['otsi2'];
 //päring
 $paring = 'SELECT * FROM albumid WHERE "%'.$otsi2.'%" LIKE "%'.$otsi.'%"';
 $valjund = mysqli_query($yhendus, $paring);
 
 echo 'Otsingusõna: '.$otsi.'<br>';
 echo 'Vastused: <br>';
 while($rida = mysqli_fetch_assoc($valjund)){
 echo $rida['artist'].' - '.$rida['album'].' - '.$rida['aasta'].'<br>';
 }
 mysqli_free_result($valjund);
 mysqli_close($yhendus); 
}
?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>