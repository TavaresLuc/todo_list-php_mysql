<?php
include 'config.php';

$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $taskClass = ($row['done'] == 1) ? 'task-done' : 'task-false';
    $taskIcon = ($row['done'] == 1) ? 'fa fa-times' : 'fa fa-check';
?>
    <li class="<?php echo $taskClass; ?>">
      <p style="word-break: break-all;"><?php echo $row['task']; ?></p>
      <div class="buttons-task">
        <button class="done-btn" data-id="<?php echo $row['id']; ?>"><i class="<?php echo $taskIcon; ?>"></i></button>
        <button class="delete-btn" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
      </div>
    </li>
<?php
  }
} else {
  echo "<div style='text-align:center; padding: 1rem;'>Opa, você não tem nenhuma tarefa!</div>";
}
?>
