<?php
    session_start();
    $_SESSION["usuario"] = "";
    $_SESSION["idUser"] = 0;
    $_SESSION["nivel"] = 1000;
    session_destroy();
    echo "<script>location.href='index.php';</script>";

?>