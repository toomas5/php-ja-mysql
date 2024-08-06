<!--
               yl07
              toomas
              25/07/24
-->

<?php
session_start();
session_destroy();
header("Location: index.php");
?>