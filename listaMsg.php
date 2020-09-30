<?php
session_start();
include('info.php');
$eu = $_SESSION['idUser'];
$amigo = $_REQUEST['idAmigo'];
//$amigo = $_COOKIE["amigo"];

echo "<small>";
try{
        $connection = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
        $connection->exec("set names utf8");
        
    }catch(PDOException $e){
        echo "Falha: " . $e->getMessage();
        exit();
    }
$rs = $connection->prepare("(SELECT Mensagens.idMsg, Mensagens.idUser idRem,
                            (SELECT Nome FROM $dMsg.Usuarios WHERE idUser = Mensagens.idUser) Remetente,
                            Mensagens.idAmigo idDest,
                            (SELECT Nome FROM $dMsg.Usuarios WHERE idUser = Mensagens.idAmigo) Destinatario,
                            Mensagens.mensagem Mensagem, Mensagens.dataCadastro Data
                        FROM $dMsg.Mensagens
                        WHERE (Mensagens.idUser = ? AND Mensagens.idAmigo = ?)
                           OR (Mensagens.idUser = ? AND Mensagens.idAmigo = ?) Order By Mensagens.idMsg DESC) LIMIT 6");
	$rs->bindParam(1,$eu);
	$rs->bindParam(2,$amigo);
    $rs->bindParam(3,$amigo);
	$rs->bindParam(4,$eu);
    
    if($rs->execute()){
        while ($registro = $rs->fetch(PDO::FETCH_OBJ)){
            if($registro->idRem == $eu){
                echo "<p class='rounded table-success'><small><span class='badge badge-danger'><a style='color: white' href='delMsg.php?delMsg=true&idMsg=". $registro->idMsg."&idAmigo=".$amigo."'>X</a></span> " . $registro->Data  . " - <b>Você</b> disse: </small><br>" . $registro->Mensagem . "</p>";
            } else{
                echo "<p class='rounded table-primary'><small>" . $registro->Data  . " - <b>" . $registro->Remetente  . "</b> disse: </small><br>" . $registro->Mensagem . "</p>";
                }

        }}else {
            echo "<h1>As mensagens não foram encontradas</h1>";
        }
echo "</small>";
?>