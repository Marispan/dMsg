<?php
session_start();
include('info.php');

if(isset($_REQUEST["delAmigo"]) && $_REQUEST["delAmigo"] == true){
      try{
          $connection1 = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
          $connection1->exec("set names utf8");
          
      }catch(PDOException $e){
          echo "Falha: " . $e->getMessage();
          exit();
      }
                
          $delAmigo = $connection1->prepare("DELETE FROM $dMsg.Amigos WHERE idUser = ? AND idAmigo = ?");
          $delAmigo->bindParam(1,$_SESSION['idUser']);
          $delAmigo->bindParam(2,$_REQUEST["idAmigo"]);
          $delAmigo->execute();
           echo "<script>location.href='amigos.php';</script>";
  

if($delAmigo->errorCode() != "00000"){
    $erro = "Erro Código: " . $delAmigo->errorCode() . " : ";
    $erro.= implode(",",$delAmigo->errorInfo());
    echo $erro;
  }
}  
?>