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
          // echo "<script>location.href='dMsg.php';</script>";
  
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