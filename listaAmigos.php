<?php
include('info.php');

try{
        $connection = new PDO($mySqlDb, $mySqlUser, $mySqlPass);
        $connection->exec("set names utf8");
        
    }catch(PDOException $e){
        echo "Falha: " . $e->getMessage();
        exit();
    }
$rs = $connection->prepare("SELECT idUser, idAmigo, dataCadastro,
                            (SELECT nome FROM $dMsg.Usuarios WHERE idUser = idAmigo) nomeAmigo,
                            (SELECT apelido FROM $dMsg.Usuarios WHERE idUser = idAmigo) apelidoAmigo
                            FROM $dMsg.Amigos WHERE idUser = ?");
	$rs->bindParam(1,$_SESSION['idUser']);
    
    if($rs->execute()){
        while ($registro = $rs->fetch(PDO::FETCH_OBJ)){
            $LinkChat='dMsg.php?chat=true&idAmigo='.$registro->idAmigo;
            $nomeAmigo=$registro->nomeAmigo;
            echo "<div class='container rounded table-info'>";
            echo "<p class='text-left'>".$registro->nomeAmigo . " (" . $registro->apelidoAmigo .")"."<br>";
            echo "<small><small>Amigos desde: ".$registro->dataCadastro;
            //echo "<a href='dMsg.php?chat=true&idAmigo=". $registro->idAmigo."'>[ Chat ]</a>";
            ?>
            <a href='#' onClick="window.open(<?php echo "'".$LinkChat."'" ?>,<?php echo "'".$nomeAmigo."'" ?>,'resizable,height=540,width=370'); return false;">[ Chat ]</a>
            <?php
            echo"<a style='color: red' href='delAmigo.php?delAmigo=true&idAmigo=". $registro->idAmigo."'>[ Remover ]</a>
            </small></small></p>";
            echo "</div>";
        }}else {
            echo "<h1>Sem Amigos :(</h1>";
        }
?>
