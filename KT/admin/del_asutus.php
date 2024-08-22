<!--
               KT
              toomas
              18/08/24
-->

<?php
include ("C:xampp/htdocs/php/KT/config.php");
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login");
    exit;
}


if(isset($_GET['koht'])) {
    $valitudKohtId = $_GET['koht'];
    $sqlValitud_koht = "SELECT nimi FROM kohad WHERE id = '$valitudKohtId'";
    $valitud_koht = $uhendus->query($sqlValitud_koht);
    $row = mysqli_fetch_assoc($valitud_koht);

    $sqlDelAsutus = "DELETE FROM kohad WHERE id = '$valitudKohtId'";
    if ($uhendus->query($sqlDelAsutus) === TRUE) {
        header("Location: /php/KT/admin/");
        exit;
    } else {
        echo "Viga hinnangu kustutamisel: " . $uhendus->error;
    }
} else {
    header("Location: /php/KT/admin/");
}

$uhendus->close();
?>
