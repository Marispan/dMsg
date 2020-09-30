<?php
include('info.php');

if(isset($_REQUEST["newUser"]) && $_REQUEST["newUser"] == true){
      try{
          $connection1 = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
          $connection1->exec("set names utf8");
          
      }catch(PDOException $e){
          echo "Falha: " . $e->getMessage();
          exit();
      }
                
          $newUser = $connection1->prepare("INSERT INTO $dMsg.Usuarios
                                          (email, nome, senha, apelido, nivel) SELECT ?,?,?,?, 2
                                          FROM DUAL WHERE NOT EXISTS (SELECT email FROM Usuarios WHERE email = ?)");
          $newUser->bindParam(1,$_POST["email"]);
          $newUser->bindParam(2,$_POST["nome"]);
          $newUser->bindParam(3,$_POST["senha"]);
          $newUser->bindParam(4,$_POST["apelido"]);
          $newUser->bindParam(5,$_POST["email"]);
          $newUser->execute();
           echo "<script>location.href='index.php';</script>";
  

if($newUser->errorCode() != "00000"){
    $erro = "Erro Código: " . $newUser->errorCode() . " : ";
    $erro.= implode(",",$newUser->errorInfo());
    echo $erro;
  }
}  
?>
<form enctype="multipart/form-data" method=POST action="cadastro.php?newUser=true">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="E-mail" name='email'>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" name='senha'>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Nome</label>
        <input type="text" class="form-control" id="inputname" placeholder="Qual o seu Nome?" name='nome'>
    </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Apelido</label>
    <input type="text" class="form-control" id="inputname" placeholder="Você tem Um Apelido?" name='apelido'>
  </div>
  <div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
  </div>  
</form>