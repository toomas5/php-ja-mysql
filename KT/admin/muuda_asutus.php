<!--
               KT
              toomas
              18/08/24
-->

<?php
include("C:/xampp/htdocs/php/KT/config.php");
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login");
    exit;
}

if(isset($_GET['koht'])) {
    $valitudKohtId = $_GET['koht'];
    $sqlValitud_koht = "SELECT * FROM kohad WHERE id = '$valitudKohtId'";
    $valitud_koht = $uhendus->query($sqlValitud_koht);
    $row = mysqli_fetch_assoc($valitud_koht);

    $sqlTyybid = "SELECT tyyp FROM tyybid";
    $sqlTyybidT = $uhendus->query($sqlTyybid);
    $tyybid = [];
    while ($tyyp = $sqlTyybidT->fetch_assoc()) {
        $tyybid[] = $tyyp['tyyp'];
    }
} else {
    header("Location: /php/KT/admin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['nimi']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>Muuda asutust > <?php echo $row['nimi']; ?></h3>
        <br>

        <form method="post">
            <div class="mb-3">
                <label for="nimi" class="form-label">Nimi:</label>
                <input type="text" name="nimi" id="nimi" style="width: 45%;" class="form-control" value="<?php echo $row['nimi']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="aadress" class="form-label">Aadress:</label>
                <input type="text" name="aadress" id="aadress" style="width: 45%;" class="form-control" value="<?php echo $row['asukoht']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tyyp" class="form-label">Tüüp:</label>
                <select name="tyyp" id="tyyp" style="width: 45%;" class="form-select" required>
                    <?php foreach ($tyybid as $tyyp) { ?>
                        <option value="<?php echo $tyyp; ?>" <?php if ($tyyp === $row['tyyp']) echo 'selected'; ?>><?php echo $tyyp; ?></option>
                    <?php } ?>
                </select>
            </div>
            <a href="/php/KT/admin/" class="btn btn-secondary">Tagasi</a>
            <input type="submit" class="btn btn-primary" value="Salvesta">
        </form>

        <?php
        if(!empty($_POST['nimi']) && !empty($_POST['aadress']) && !empty($_POST['tyyp'])){
            $nimi = $_POST['nimi'];
            $aadress = $_POST['aadress'];
            $tyyp = $_POST['tyyp'];

            $sqlMuudaAsutus = "UPDATE kohad SET nimi='$nimi', asukoht='$aadress', tyyp='$tyyp' WHERE id = '$valitudKohtId'";
            if ($uhendus->query($sqlMuudaAsutus) === TRUE){
                echo "Asutus on edukalt muudetud.";
                header("Location: /php/KT/admin/");
                exit;
            } else {
                echo "Error: " . $sqlMuudaAsutus . "<br>" . $uhendus->error;
            }
        }
        $uhendus->close();
        ?>   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
