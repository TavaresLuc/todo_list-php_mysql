<?php
include '../config.php';

$id = $_POST['id'];

// Obtém o valor atual do campo "done" para o ID especificado
$sql = "SELECT done FROM tasks WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $done = $row['done'];

  // Inverte o valor do campo "done"
  $newDone = $done == 1 ? 0 : 1;

  // Atualiza o campo "done" no banco de dados
  $updateSql = "UPDATE tasks SET done='$newDone' WHERE id='$id'";
  $updateResult = mysqli_query($conn, $updateSql);

  if ($updateResult) {
    echo $newDone; // Retorna o novo valor atualizado do campo "done"
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  echo "Task not found";
}
?>
