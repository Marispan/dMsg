<?php
include('info.php');
try{
        $connection = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
        $connection->exec("set names utf8");
        
    }catch(PDOException $e){
        echo "Falha: " . $e->getMessage();
        exit();
    }
$rs = $connection->prepare("SELECT Usuarios.idUser, Usuarios.nome, Usuarios.email, Usuarios.senha,
                                   Usuarios.apelido, Usuarios.dataCadastro, Usuarios.nivel
                                   FROM $dMsg.Usuarios");
    
    if($rs->execute()){
        while ($registro = $rs->fetch(PDO::FETCH_OBJ)){
            $rs1 = $connection->prepare("SELECT idUser, idAmigo From $dMsg.Amigos Where
                                        (idUser = ? AND idAmigo = ?) OR (idUser = ? AND idAmigo = ?)");
            $rs1->bindParam(1,$_SESSION['idUser']);
            $rs1->bindParam(2,$registro->idUser);
            $rs1->bindParam(3,$registro->idUser);
            $rs1->bindParam(4,$_SESSION['idUser']);

            $cancela=0;
            
            if($rs1->execute()){
                while ($registro1 = $rs1->fetch(PDO::FETCH_OBJ)){
                    $cancela=1;
                }}
                if($cancela==0){
                    if($registro->idUser != $_SESSION['idUser']){
                        echo "<div class='container rounded table-info'>";
                        echo "<p class='text-left'>".$registro->nome . " (" . $registro->apelido.")"."<br>";
                        echo "<small><small>Cadastrado desde: ".$registro->dataCadastro;
                        echo "<a href='addAmigo.php?newAmigo=true&idAmigo=". $registro->idUser."'>[ Add ]</a></small></small></p>";
                        echo "</div>";
                    }
                }
        }}else {
            echo "<h1>Sem Amigos :(</h1>";
        }
?>
