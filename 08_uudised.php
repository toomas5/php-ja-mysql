<?php include ("config.php"); ?>
<!doctype html>

<!--
               yl08
              toomas
              06/08/24
-->

<html lang="en">

<head>
    <title>8</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php

    // uudiseid ühel lehel
    $uudiseid_lehel = 100;

    // lehtede arvutamine
    $uudiseid_kokku_paring = "SELECT COUNT('id') FROM uudis";
    $lehtede_vastus = mysqli_query($yhendus, $uudiseid_kokku_paring);
    if (!$lehtede_vastus) {
        die("Query failed: " . mysqli_error($yhendus));
    }
    $uudiseid_kokku = mysqli_fetch_array($lehtede_vastus);
    $lehti_kokku = $uudiseid_kokku[0];
    $lehti_kokku = ceil($lehti_kokku/$uudiseid_lehel);

    echo 'Lehekülgi kokku: '.$lehti_kokku.'<br>';
    echo 'Uudiseid lehel: '.$uudiseid_lehel.'<br>';

    // kasutaja valik
    $leht = isset($_GET['page']) ? $_GET['page'] : 1;

    // millest näitamist alustatakse
    $start = ($leht-1)*$uudiseid_lehel;

    // andmebaasist andmed
    $paring = "SELECT * FROM uudis LIMIT $start, $uudiseid_lehel";
    $vastus = mysqli_query($yhendus, $paring);

    // väljastamine
    while ($rida = mysqli_fetch_assoc($vastus)){
        echo '<h3>'.$rida['tiitel'].'</h3>';
        echo '<p>'.$rida['uudis'].'</p>';
    }

    // kuvame lingid
    $eelmine = $leht - 1;
    $jargmine = $leht + 1;

    if ($leht > 1) {
        echo "<a href=\"?page=$eelmine\">Eelmine</a> ";
    }

    if ($lehti_kokku >= 1) {
        for ($i = 1; $i <= $lehti_kokku; $i++) { 
            if ($i == $leht) {
                echo "<b><a href=\"?page=$i\">$i</a></b> ";
            } else {
                echo "<a href=\"?page=$i\">$i</a> ";
            }
        }
    }

    if ($leht < $lehti_kokku) {
        echo "<a href=\"?page=$jargmine\">Järgmine</a> ";
    }

    mysqli_close($yhendus);
?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

