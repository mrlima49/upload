<?php
require_once "config.php";
$arquivos_permitidos = ['jpg', 'jpeg', 'png'];
echo "<pre>";
if(isset($_FILES['arquivo']['tmp_name'])){
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    $nome = uniqid().".$extensao";
    if(in_array($extensao, $arquivos_permitidos)){
        
        move_uploaded_file($_FILES['arquivo']['tmp_name'], "img/".$nome);
        $sql = "INSERT INTO imgs(url_img) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome]);
        if($stmt->rowCount() > 0){
            header("Location:fotos.php");
        }else{
            echo "erro";
        }
    }else{
        echo "extensao não permitida";
    }
}
    
