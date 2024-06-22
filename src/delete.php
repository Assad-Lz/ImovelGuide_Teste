<?php
if (!empty($_GET['id'])) {
  include_once('conection.php');

  $id = $_GET['id'];

  $sqlDelete = "DELETE FROM corretores WHERE id=$id";

  $resultDelete = $conn->query($sqlDelete);

  
  if ($resultDelete) {
    echo "Registro deletado com sucesso!";
  } else {
    echo "Erro ao deletar registro!";
  }
}

header("Location: index.php");
?>

