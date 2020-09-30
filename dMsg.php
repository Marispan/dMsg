<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if(isset($_SESSION["idUser"]) && isset($_SESSION["usuario"])){
include('info.php');
$eu = $_SESSION["idUser"];


if(isset($_REQUEST["chat"])){
    $_SESSION['idAmigo'] = $_REQUEST["idAmigo"];
    $amigo = $_REQUEST["idAmigo"];
    //$amigo = $_SESSION['idAmigo'];
    
}
if(isset($_SESSION['idAmigo'])){

?>

<html>
    <head>
        <title>dMsg - Keep Talking</title>
    </head>
    <body class='bg-light'>
        <head>	
            <?php include("bs.php")?>
            <!--<meta HTTP-EQUIV='refresh' CONTENT='30;URL=index.php'>-->
        </head>

        <!--Inicio Conteudo-->
        <div class='container bg-light mb-2'>
            <p class='text-right'><small><span class='badge badge-primary'><a href='dMsg.php' style='color: white'>Atualizar</a></span> |
                                        <span class='badge badge-info'><a href='amigos.php' style='color: white'>Amigos</a></span> |
                                        <span class='badge badge-danger'><a href='#' style='color: white'>Limpar</a></span> |
                                        <span class='badge badge-warning'><a href='logout.php' style='color: white'>Logout</a></span> | 
                                        <span class='badge badge-info'><?php echo $_SESSION["idUser"] . " - " . $_SESSION["usuario"]?></span></small></p>
            <p class='h6 text-center'> Mensagens</p>
            <div class='container'>
                <div>
                    <?php include_once('formEnvio.php') ?>
                </div>
                
                    <script type="text/javascript">
                        var auto_refresh = setInterval(
                        function ()
                        {
                        $('#update_msg').load("<?php echo 'listaMsg.php?idAmigo='.$_REQUEST['idAmigo'] ?>").fadeIn("slow");
                        }, 500); // refresh every 10000 milliseconds
                    </script>
                <div id='update_msg'> 
                <?php //include('listaMsg.php') ?>
                </div>
            </div>
        </div>
        <!--Final Conteudo-->
        <footer>
            
        </footer>
    </body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
</html>
<?php
}else {
    echo "<center><h1>:/ Nenhum amigo selecionado -> <a href='amigos.php'>Amigos</a></h1></center>";
}
}else{
    echo "<center><h1>Você precisa estar logado -> <a href='index.php'>Login</a></h1></center>";
}

?>