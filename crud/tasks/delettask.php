<?php
  require"../login/config.php";
  if(isset ($_GET["taskid"])){

    $request = " DELETE FROM tasks WHERE id=?";
    $statement = $pdo->prepare($request);
    $statement->execute(array($_GET["taskid"]));
    header("location:tasks.php");
  }
?>