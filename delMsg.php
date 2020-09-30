<?php
session_start();
include('info.php');

if(isset($_REQUEST["delMsg"]) && $_REQUEST["delMsg"] == true){
      try{
          $connection1 = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
          $connection1->exec("set names utf8");
          
      }catch(PDOException $e){
          echo "Falha: " . $e->getMessage();
          exit();
      }
                
          $delMsg = $connection1->prepare("DELETE FROM $dMsg.Mensagens WHERE idMsg = ?");
          $delMsg->bindParam(1,$_REQUEST['idMsg']);
          $delMsg->execute();
          echo "<script>location.href='dMsg.php?chat=true&idAmigo=".$_REQUEST['idAmigo']."';</script>";
  

if($delMsg->errorCode() != "00000"){
    $erro = "Erro Código: " . $delMsg->errorCode() . " : ";
    $erro.= implode(",",$delMsg->errorInfo());
    echo $erro;
  }
}  
?>