<?php
include ("07_config.php");
session_start();
?>
<!doctype html>

<!--
               yl07
              toomas
              06/08/24
-->

<html lang="en">

<head>
    <title>7</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="07_login.php">LOGI SISSE</a> &nbsp;&nbsp; <a href="08_uudised.php">UUDISED</a><br>
        
    
        <h3>Tagasiside</h3><br>
        <form action="#" method="get">
            <label for="nimi">Teie nimi:</label><br>
                <input type="text" name="nimi" id="nimi"><br><br>

            <label for="email">Teie email:</label><br>
                <input type="text" name="email" id="email"><br><br>
                
            <label for="sonum">Sõnum:</label><br>
                <textarea cols="50" rows="5" name="sonum" id="sonum"></textarea><br><br>
                
            <img src="07_kypsised.php">
            <label for="kood">Sisestage kood pildilt:</label><br>
            <input type="text" name="kood" id="kood"><br>
            <input type="submit" class="btn btn-success my-2" value="Saada">
        </form>

        <?php
        if(!empty($_GET['nimi']) && !empty($_GET['email']) && !empty($_GET['sonum'])){
            $nimi = $_GET['nimi']; 
            $email = $_GET['email'];
            $sonum = $_GET['sonum'];

            $to = 'toomassilmberg@gmail.com'; 
            $subject = 'Tagasiside ül 7'; 
            $message = $sonum; 
            $from = 'From: '.$nimi.'<'.$email.'>'; 

            if ($_GET['kood']==$_SESSION['captchatext']){
                if(mail($to, $subject, $message, $from)){ 
                    echo "Email saadetud!<br>Täname tagasiside eest!"; 
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL='07_index.php'\">"; 
                    exit(); 
                } else { 
                    echo "Teie emaili ei saadetud ära!"; 
                }
            }
        }
?>

        



<?php
$yhendus->close();
?>  



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
