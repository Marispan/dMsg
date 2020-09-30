<html>
    <head>
        <title>dMsg - Keep Talking</title>
    </head>
    <body class='bg-light'>
        <head><? start_session(); ?>	
            <?php include("bs.php")?>
            <!--<meta HTTP-EQUIV='refresh' CONTENT='30;URL=index.php'>-->
        </head>

        <!--Inicio Conteudo-->
        <div class='container bg-light mb-2'>
            <p class='text-right'>
                <small><span class='badge badge-primary'><a href='cadastro.php' style='color: white'>Atualizar</a></span>
                <span class='badge badge-primary'><a href='index.php' style='color: white'>Voltar</a></span>
            </p>
            <p class='h6 text-center'> Cadastro</p>
            <div class='container'>
                <div>
                    <?php include('formCad.php') ?>
                </div>
                
 
                </div>
            </div>
        </div>
        <!--Final Conteudo-->
        <footer>
            
        </footer>
    </body>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
</html>