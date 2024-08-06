<?php include('config.php'); ?>
<!doctype html>
<!--
               yl09
              toomas
              27/07/24
-->

<html lang="fi">
<head>
    <title>9</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">

<?php
    class Auto {
        var $v2rv;
        var $tootja;
        var $kiirus = 0;

        function kiirendus() {
            echo 'Minu '.$this->v2rv.' '.$this->tootja.' annab tuld<br>';
            while ($this->kiirus < 100) {
                $this->kiirus += 10;
                if ($this->kiirus >= 100) {
                    echo "Kiirus: 100 km/h<br><br>";
                    break;
                }
                echo "Kiirus: " . $this->kiirus . " km/h<br>";
            }
        }
    }

    $auto1 = new Auto;
    $auto1->v2rv = 'sinine';
    $auto1->tootja = 'bemar';
    $auto1->kiirendus();

    $auto2 = new Auto;
    $auto2->v2rv = 'must';
    $auto2->tootja = 'Volvo';
    $auto2->kiirendus();
?>

</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
