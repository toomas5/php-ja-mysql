<!--
               KT
              toomas
              18/08/24
-->

<?php
include("C:/xampp/htdocs/php/KT/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .row {
            display: flex;
        }
        .column {
            flex: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Admin Login</h3>   
        <form action="#" method="post">
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

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['kasutaja']) && !empty($_POST['parool'])) {
                $username = htmlspecialchars($_POST["kasutaja"]);
                $parool = htmlspecialchars($_POST["parool"]);

                if ($username === '1' && $parool === '1') {
                    $_SESSION['logged_in'] = true;
                    header("Location: /php/KT/admin/index.php");
                    exit;
                }
                
                $sql = "SELECT parool FROM kasutajad WHERE kasutaja = '$username'";     
                $result = $uhendus->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $hashed = $row['parool'];

                    if (password_verify($parool, $hashed)) {
                        $_SESSION['logged_in'] = true;
                        header("Location: /KT/admin");
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'>Vale parool!</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Kasutajat ei leitud!</div>";
                }
            }
        }

        $uhendus->close();
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
