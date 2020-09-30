<?php
if(isset($_SESSION['idUser'])){
  if(isset($_REQUEST["newMsg"]) && $_REQUEST["newMsg"] == true){
      try{
          $connection1 = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
          $connection1->exec("set names utf8");
          
      }catch(PDOException $e){
          echo "Falha: " . $e->getMessage();
          exit();
      }
      if(strlen($_REQUEST["msg"]) > 0){
          $newMsg = $connection1->prepare("INSERT INTO $dMsg.Mensagens (idUser, idAmigo, mensagem)
                                          VALUES (?, ?, ?)");
          $newMsg->bindParam(1,$_SESSION['idUser']);
          $newMsg->bindParam(2,$_REQUEST['idAmigo']);
          $newMsg->bindParam(3,$_POST["msg"]);
          $newMsg->execute();
           //echo "<script>location.href='index.php';</script>";
  
      }  
          if($newMsg->errorCode() != "00000"){
        $valido = false;
        $erro = "Erro Código: " . $newMsg->errorCode() . " : ";
        $erro.= implode(",",$newMsg->errorInfo());
        echo $erro;
      }
  }
}
?>
<form enctype="multipart/form-data" method=POST action="dMsg.php?newMsg=true&idAmigo=<?php echo $_REQUEST['idAmigo'] ?>" class='mt-3'>
    <textarea class="form-control mb-2 form-control-sm" id="msg" placeholder="Escreva aqui..." name="msg" rows="3" maxlength="2200"></textarea>
    <div class="row">
    <div class="col-md-12 mb-3 mt-2">
      <button class="btn btn-success btn-sm" type="submit">Enviar</button>
    </div>  
  </div>
</form>
