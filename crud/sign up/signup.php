<?php
  require "../login/config.php";
  
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $password = $_POST["password"];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
       if(empty($username)  or empty($fullname) or empty($password))
       {
        echo " please enter correct info";
        header("REFRESH:3,URL=signupform.php");
       }else{
        $request="SELECT * FROM users WHERE username=?";
        $statement = $pdo->prepare($request);
        $statement->execute(array($username));
        $existe_username = $statement->rowCount();
        if($existe_username==0){
        $request = "INSERT INTO users (username, password, full_name) VALUES (?,?,?)";
        $statment = $pdo->prepare($request);
        $statment->execute(array($username,$password,$fullname));
        $user_id = $pdo->lastInsertId();
        header("location:../tasks/tasks.php?user_id=".$user_id);
    }else{
    echo "user name exists already";
    header("REFRESH:3,URL=signupform.php");
  }
}
    }else{
      echo "you cant access";
    header("REFRESH:3,URL=signupform.php");
    }
    
?>