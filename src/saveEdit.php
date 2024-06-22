<?php
include_once('conection.php');

if (isset($_POST['salvar'])) {
  $id = $_POST['id']; 
  $cpf = $_POST['cpf'];
  $creci = $_POST['creci'];
  $nome = $_POST['nome'];

  $sqlUpdate = "UPDATE corretores SET cpf = ?, creci = ?, nome = ? WHERE id = ?";
  $stmt = $conn->prepare($sqlUpdate);
  $stmt->bind_param("ssss", $cpf, $creci, $nome, $id); 

  if ($stmt->execute()) {
    echo "Dados atualizados com sucesso!";
  } else {
    echo "Erro ao atualizar dados: " . $conn->error;
  }

  $stmt->close(); 
}

header("Location: index.php"); 
?>



