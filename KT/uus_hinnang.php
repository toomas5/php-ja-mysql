<!--
               KT
              toomas
              18/08/24
-->

<?php
include("config.php");
session_start();

if(isset($_GET['koht'])) {
    $valitudkoht = $_GET['koht'];
    $sqlValitud_koht = "SELECT nimi FROM kohad WHERE id = '$valitudkoht'";
    $valitud_koht = $uhendus->query($sqlValitud_koht);
    $row = mysqli_fetch_assoc($valitud_koht);
} else {
    header("Location: /php/KT/");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nimi']) && !empty($_POST['kommentar']) && !empty($_POST['hinnang'])) {
    $nimi = $_POST['nimi'];
    $kommentar = $_POST['kommentar'];
    $hinnang = $_POST['hinnang'];

    $sql_uus_hinnang = "INSERT INTO hinnangud (nimi, kommentar, hinnang, koht_id) VALUES ('$nimi', '$kommentar', '$hinnang', '$valitudkoht')";

    if ($uhendus->query($sql_uus_hinnang) === TRUE) {
        $success_message = "Hinnang on edukalt uustud.";
    } else {
        $error_message = "Error: " . $sql_uus_hinnang . "<br>" . $uhendus->error;
    }
}

$sql_hinnangud = "SELECT * FROM hinnangud WHERE koht_id = '$valitudkoht'";
$result_hinnangud = $uhendus->query($sql_hinnangud);

$uhendus->close();
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['nimi']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .star [type="radio"] {
            appearance: none;
        }
        .star label:has(~ :checked) {
            color: DarkOrange;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Hinda kohta > <?php echo htmlspecialchars($row['nimi']); ?></h3><br>

        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success_message); ?></div>
        <?php elseif (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="nimi" class="form-label">Nimi:</label>
                <input type="text" name="nimi" id="nimi" style="width: 45%;" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kommentar" class="form-label">Kommentaar:</label>
                <textarea name="kommentar" id="kommentar" style="width: 60%;" class="form-control" rows="4" required></textarea>
            </div>

            <p class="star">Hinnang (1-10):<br>
                <label for="hinnang1"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang1" value="1" required>
                <label for="hinnang2"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang2" value="2">
                <label for="hinnang3"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang3" value="3">
                <label for="hinnang4"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang4" value="4">
                <label for="hinnang5"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang5" value="5">
                <label for="hinnang6"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang6" value="6">
                <label for="hinnang7"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang7" value="7">
                <label for="hinnang8"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang8" value="8">
                <label for="hinnang9"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang9" value="9">
                <label for="hinnang10"><i class="fa fa-star"></i></label>
                <input type="radio" name="hinnang" id="hinnang10" value="10">
            </p>
            <div style="float: middle;">
                <a href="/php/KT/" class="btn btn-secondary">Tagasi</a>
                <input type="submit" class="btn btn-primary" value="Postita">
            </div>
        </form>
        <br>
        <hr>
        <h2>Teiste hinnangud</h2><br>
        <?php
        if ($result_hinnangud->num_rows > 0) {
            while ($row = $result_hinnangud->fetch_assoc()) {
                echo '<h5 class="mb-1">' . htmlspecialchars($row["nimi"]) . ' <span class="badge bg-warning">' . htmlspecialchars($row["hinnang"]) . '/10</span></h5>';
                echo '<p>' . htmlspecialchars($row["kommentar"]) . '</p>';
            }
        } else {
            echo '<div class="alert alert-info">Hinnanguid ei leitud.</div>';
        }
        ?>
    </div>
    <script>
    function changeColor(radio) {
        var stars = document.querySelectorAll('.star');
        stars.forEach(function(star) {
            star.classList.remove('checked');
        });
        radio.classList.add('checked');
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
