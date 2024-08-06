<?php include('config.php'); ?>
<!doctype html>
<!--
               yl03
              toomas
              07/06/24
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
    <title>3</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3>Lisa uus album:</h3>
        <form action="#" method="get">
        <div class="row">
            <div class="column" style="line-height:1.8;">
                <label for="artist">Artist:</label>
                <label for="album">Album:</label>
                <label for="aasta">Aasta:</label>
                <label for="hind">Hind:</label>
            </div>
            <div class="column">
                <input type="text" name="artist" id="artist">
                <input type="text" name="album" id="album">
                <input type="number" name="aasta" id="aasta">
                <input type="number" name="hind" id="hind">
                <input type="submit" class="btn btn-success my-2" value="Lisa">
            </div>
        </div>
    </div>
</form>


<?php
if(!empty($_GET['artist']) && !empty($_GET['album']) && !empty($_GET['aasta']) && !empty($_GET['hind'])){
    $artist = $_GET["artist"];
    $album = $_GET["album"];
    $aasta = $_GET["aasta"];
    $hind = $_GET["hind"];

    $artist = mysqli_real_escape_string($yhendus, $artist);
    $album = mysqli_real_escape_string($yhendus, $album);
    $aasta = mysqli_real_escape_string($yhendus, $aasta);
    $hind = mysqli_real_escape_string($yhendus, $hind);

    $lisasql = "INSERT INTO albumid (artist, album, aasta, hind) VALUES ('$artist','$album','$aasta','$hind')";
    if ($yhendus->query($lisasql) === TRUE) {
        echo "Lisatud!";
    } else {
        echo "Viga: " . $yhendus->error;
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'kustuta' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $kustutasql = "DELETE FROM albumid WHERE id=$id";
    if ($yhendus->query($kustutasql) === TRUE) {
        echo "Kustutatud!";
    } else {
        echo "Viga: " . $yhendus->error;
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'muuda' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $muudasql = "SELECT * FROM albumid WHERE id = $id";
    $muuda_t = $yhendus->query($muudasql);

    if ($muuda_t && $muuda_t->num_rows > 0) {
        $muuda_rida = $muuda_t->fetch_assoc();
        $muuda_artist = $muuda_rida["artist"];
        $muuda_album = $muuda_rida["album"];
        $muuda_aasta = $muuda_rida["aasta"];
        $muuda_hind = $muuda_rida["hind"];
        ?>
        <h3>Muuda albumit:</h3>
        <form action='#' method='get'>
            <input type='hidden' name='action' value='salvesta_muudatus'>
            <input type='hidden' name='id' value='<?php echo $id; ?>'>
            <label for='artist'>Artist:</label>
            <input type='text' name='artist' id='artist' value='<?php echo $muuda_artist; ?>'><br>
            <label for='album'>Album:</label>
            <input type='text' name='album' id='album' value='<?php echo $muuda_album; ?>'><br>
            <label for='aasta'>Aasta:</label>
            <input type='text' name='aasta' id='aasta' value='<?php echo $muuda_aasta; ?>'><br>
            <label for='hind'>Hind:</label>
            <input type='text' name='hind' id='hind' value='<?php echo $muuda_hind; ?>'><br>
            <input type='submit' class='btn btn-success my-2' value='Muuda'>
        </form>
        <?php
    }   
}

$ots = "SELECT * FROM albumid";
$val = $yhendus->query($ots);

    echo "<h3>Kõik albumid:</h3>";
    while($row = $val->fetch_assoc()) {
        echo "<p>";
        echo $row["artist"].' | '.$row["album"].' | '.$row["aasta"].' | '.$row["hind"].'€';
        echo " <a href='?action=muuda&id=".$row["id"]."'>Muuda</a>";
        echo " <a href='?action=kustuta&id=".$row["id"]."' onclick=\"return confirm('Kindel?');\">Kustuta</a>";
        echo "</p>";
    }

?>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>