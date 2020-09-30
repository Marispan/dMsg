<?php
session_start();
include('info.php');

if(isset($_REQUEST["newAmigo"]) && $_REQUEST["newAmigo"] == true){
      try{
          $connection1 = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
          $connection1->exec("set names utf8");
          
      }catch(PDOException $e){
          echo "Falha: " . $e->getMessage();
          exit();
      }
                
          $newUser = $connection1->prepare("INSERT INTO $dMsg.Amigos (idUser, idAmigo)VALUES (?, ?);
                                            INSERT INTO $dMsg.Amigos (idUser, idAmigo)VALUES (?, ?)");
          $newUser->bindParam(1,$_SESSION['idUser']);
          $newUser->bindParam(2,$_REQUEST["idAmigo"]);
          $newUser->bindParam(4,$_SESSION['idUser']);
          $newUser->bindParam(3,$_REQUEST["idAmigo"]);
          $newUser->execute();
           echo "<script>location.href='amigos.php';</script>";
  

if($newUser->errorCode() != "00000"){
    $erro = "Erro Código: " . $newUser->errorCode() . " : ";
    $erro.= implode(",",$newUser->errorInfo());
    echo $erro;
  }
}  
?>