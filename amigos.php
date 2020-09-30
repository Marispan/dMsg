<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if(isset($_SESSION["idUser"]) && isset($_SESSION["usuario"])){
?>

<html>
    <header>
        <title> Amigos de <?php echo $_SESSION["usuario"] ?> </title>
        <?php include("bs.php")?>
    </header>
    <body class='bg-light'>
        <div class='container'>
            <div class='container'><p class='h4'>Amigos de <?php echo $_SESSION["usuario"] . " (".$_SESSION["apelido"].")"; ?></p></div>
            <div class='container'>
                <?php include('listaAmigos.php') ?>
            </div>
        </div>
        <div class='container'>
            Outros contatos
            <div class='container'>
                <?php include('listaUsuarios.php') ?>
            </div>
        </div>
    </body>
</html>
<?php
}else{
    echo "<center><h1>Você precisa estar logado -> <a href='index.php'>Login</a></h1></center>";
}
?>