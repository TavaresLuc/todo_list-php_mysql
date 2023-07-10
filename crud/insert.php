<?php
  // Include Connection
  include '../config.php';

  $task = $_POST['task'];

  $sql = "INSERT INTO tasks (task) VALUES ('$task')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo 1;
  }else {
    echo "Error: {$sql}" . mysqli_error($conn);
  }
?>
