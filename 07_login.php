<?php
	session_start();
	include('config.php');

	if (isset($_SESSION['tuvastamine'])) {
	  header('Location: 07_admin.php');
	  exit();
	}
	//kontrollime kas väljad on täidetud
	if (!empty($_POST['login']) && !empty($_POST['pass'])) {
		//eemaldame kasutaja sisestusest kahtlase pahna
		$login = htmlspecialchars(trim($_POST['login']));
		$pass = htmlspecialchars(trim($_POST['pass']));
		//SIIA UUS KONTROLL
		$sool = 'taiestisuvalinetekst';
		$kryp = crypt($pass, $sool);
		//kontrollime kas andmebaasis on selline kasutaja ja parool
		$paring = "SELECT * FROM kasutajad WHERE kasutaja='$login' AND parool='$kryp'";
		$valjund = mysqli_query($yhendus, $paring);
		//kui on, siis loome sessiooni ja suuname
		if (mysqli_num_rows($valjund)==1) {
			$_SESSION['tuvastamine'] = 'misiganes';
			header('Location: 07_admin.php');
		} else {
			echo "kasutaja või parool on vale";
		}
	}
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
    <br><h3>Login</h3>
    <form action="#" method="get">
        <div class="row">
            <div class="column" style="line-height:1.8;">
                <label for="kasutaja">Kasutaja:</label>
                <label for="parool">Parool:</label>
            </div>
            <div class="column">
                <input type="text" name="kasutaja" id="kasutaja" required>
                <input type="password" name="parool" id="parool" required>
                <input type="submit" class="btn btn-secondary my-2" value="Logi sisse">
            </div>
        </div>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
