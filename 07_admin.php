<?php
session_start();
if (!isset($_SESSION['tuvastamine'])) {
  header('Location: 07_login.php');
  exit();
  }
include ("config.php");
?>

<!doctype html>
<!--
               yl07
              toomas
              25/07/24
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
    <title>7</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<div class="container">
    <br>
    <a href="logout.php">LOGI VÄLJA</a>
    <h3>Regristeeri</h3>
    <form action="#" method="get">
        <div class="row">
            <div class="column" style="line-height:1.8;">
                <label for="kasutaja">Kasutaja:</label>
                <label for="parool">Parool:</label>
            </div>
            <div class="column">
                <input type="text" name="kasutaja" id="kasutaja" required>
                <input type="password" name="parool" id="parool" required>
                <input type="submit" class="btn btn-secondary my-2" value="Regristeeri">
            </div>
        </div>
    </form>
</div>


<?php
    if(!empty($_GET['kasutaja']) && !empty($_GET['parool'])){
        $kasutaja = htmlspecialchars($_GET["kasutaja"]);
        $parool = htmlspecialchars($_GET["parool"]);

        $query = "SELECT COUNT(*) as count FROM kasutajad WHERE kasutaja = '$kasutaja'";
        $result = $yhendus->query($query);
        $user_count = $result->fetch_assoc()["count"];

        if ($user_count > 0) {
            echo "Kasutajanimi on juba kasutuses.";
        } else{
            if (strlen($parool) < 8) {
                echo "Parool peab olema vähemalt 8 tähemärki.";
            } else{
                $hashed = password_hash($parool, PASSWORD_DEFAULT);
                $lisasql = "INSERT INTO kasutajad (kasutaja, parool) VALUES ('$kasutaja', '$hashed')";
                $lisa = $yhendus->prepare($lisasql);

                if(password_verify($parool, $hashed)){
                    if ($yhendus->query($lisasql) === TRUE) {
                        header("Location: 07_admin.php");
                        exit;
                    }
                }  
            }
        }
    }

$yhendus->close();

?>  

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
