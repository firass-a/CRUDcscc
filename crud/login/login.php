<?php
  require "./config.php";
  
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
       if(empty($username)  or empty($password))
       {
        echo " please enter correct info";
        header("REFRESH:3,URL=signupform.php");
       }else{
        $request="SELECT * FROM users WHERE username=?";
        $statement = $pdo->prepare($request);
        $statement->execute(array($username));
        $existe_username = $statement->rowCount();
        if($existe_username==0){
            echo("username not found");
            header("REFRESH:3,URL=loginform.php");
        }else{
            $user = $statement->fetch();
            if($user["password"]=$password){
                header("location:../tasks/tasks.php?user_id=".$user["id"]);
            }else{
            echo"incorrect password";
            }
        }

    }
  }else{

    echo "you cant access";
    header("REFRESH:3,URL=loginform.php");
  }
?>