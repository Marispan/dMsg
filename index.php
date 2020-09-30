<?php
session_start();
include('info.php');

    if(isset($_REQUEST["autenticar"]) && $_REQUEST["autenticar"] == true){
        //$hashDaSenha = md5($_POST["senha"]. "MaRiSpAn5000");
        $hashDaSenha = $_POST["senha"];
               
        try{
            $efetuarLogin = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
            $efetuarLogin->exec("set names utf8");
         }
         catch(PDOException $eL){
            echo "Falha: " . $eL->getMessage();
         }

         $sqlEfetuarLogin = "SELECT idUser, nome, nivel, email, apelido FROM $dMsg.Usuarios
                              WHERE email = ? AND senha = ?";
         $rsLogin = $efetuarLogin->prepare($sqlEfetuarLogin);
         $rsLogin->bindParam(1,$_POST["email"]);
         $rsLogin->bindParam(2,$hashDaSenha);
		 
		 if($rsLogin->execute()){
			if($registroLogin = $rsLogin->fetch(PDO::FETCH_OBJ)){
                $_SESSION["usuario"] = $registroLogin->nome;
                $_SESSION["idUser"] = $registroLogin->idUser;
                $_SESSION["nivel"] = $registroLogin->nivel;
                $_SESSION["apelido"] = $registroLogin->apelido;
                $_SESSION["destinatario"] = 0;
                echo "<script>location.href='amigos.php';</script>"; 
			}else{
				echo "<div class='alert alert-danger col-12 text-center'>Usuário ou Senha inválido</div>";
			}
			
		 } else {
			echo "falha no acesso";
		 }
         
    }
if(isset($_SESSION['usuario']) && isset($_SESSION['idUser'])){
    echo "<script>location.href='amigos.php';</script>"; 
}
?>
<html>
    <head>
        <title>Bem vindo ao dMsg!</title>
        <?php include("bs.php")?>
    </head>
    
    <body>	
        <div class='container mt-4'>
            <div class='container'>
                <div class='container text-center alert alert-secondary rounded mt-2 h5'>
                <p>Bem vindo!<br>
                dMsg! Keep Talking</p>
                </div>
                <form method=POST action="?autenticar=true">
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Usuário:</label>
                    <input type="email" name='email' class="form-control form-control-sm" id="email" aria-describedby="emailHelp" placeholder="Seu Usuario">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Senha:</label>
                    <input type="password" name='senha' class="form-control form-control-sm" id="senha" placeholder="Senha">
                    <small id="senha" class="form-text text-muted">Nunca compartilhe sua senha</small>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Login</button>
                </form>
            </div>
            <div><p class='text-right'><small><span class='badge badge-primary'><a href='cadastro.php' style='color: white'>Cadastrar</a></span></p></div>
        </div>
    </body>
</html>
