<!--
               KT
              toomas
              18/08/24
-->

<?php
include("C:/xampp/htdocs/php/KT/config.php");
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: /php/KT/login");
    exit;
}

if (isset($_GET['kommentar']) && isset($_GET['koht'])) {
    $kommentar = $_GET['kommentar'];
    $koht = $_GET['koht'];

    $stmt = $uhendus->prepare("DELETE FROM hinnangud WHERE kommentar = ? AND koht_id = ?");
    $stmt->bind_param("si", $kommentar, $koht);

    if ($stmt->execute()) {
        $stmt->close();
        $uhendus->close();
        header("Location: /php/KT/admin/uus_hinnang.php?koht=$koht");
        exit;
    } else {
        echo "Viga hinnangu kustutamisel: " . $uhendus->error;
    }
} else {
    header("Location: /php/KT/");
    exit;
}
?>
