<?php
require"../login/config.php";

session_start();
if(isset($_GET["taskid"])){
    $_SESSION["task_id"]=$_GET["taskid"];
}
$task_id = $_SESSION["task_id"];
if(isset($_POST["updatedtask"])){
    $request = "UPDATE tasks SET task=? WHERE id=?";
    $statement = $pdo->prepare($request);
    $statement->execute(array($_POST["updatedtask"],$task_id));
    header("location:tasks.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 $request = "SELECT * FROM tasks WHERE id=?";
 $statement = $pdo->prepare($request);
 $statement->execute(array($task_id));
 $thetask = $statement->fetch();
?>





    <form action="updatetask.php" method="post">
    <input type="text" name="updatedtask" value="<?= $thetask["task"]?>">
    <br>
    <input type="submit">
    </form>
</body>
</html>