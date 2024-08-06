<?php include('config.php'); ?>
<!doctype html>
<!--
               yl04
              toomas
              13/06/24
-->

<html lang="en">
<style>
        <style>
        .row {
            display: flex;
        }
        .column {
            flex: 0;
        }
</style>

<head>
    <title>4</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<?php include('config.php'); ?>
<?php
    $paring = "SELECT arved.arve_nr, albumid.artist, albumid.album, kliendid.eesnimi, kliendid.perenimi
    FROM arved, albumid, kliendid
    WHERE arved.albumid_id=albumid.id AND arved.kliendid_id=kliendid.id";
    
	$valjund = $yhendus->query($paring);
        while($rida = $valjund->fetch_assoc()) {
		echo 'Arve number: '.$rida['arve_nr'].'<br>';
        echo 'Kliendi nimi: '.$rida['eesnimi'].' '.$rida['perenimi'].'<br>';
		echo 'Toote nimetus: '.$rida['artist'].' - '.$rida['album'].'<br><br>';
        }
    
	mysqli_free_result($valjund);
	mysqli_close($yhendus);	
?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>