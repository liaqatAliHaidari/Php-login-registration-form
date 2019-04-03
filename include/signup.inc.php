<?php
if(isset($_POST['signup-submit'])){
  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  echo $username." ".$email." ".$password."  ".$passwordRepeat;

  if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
      exit();
    }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
      header("Location: ../signup.php?error=invalidemailuid");
      exit();
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidemail&uid=".$username);
      exit();
  }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      header("Location: ../signup.php?error=invalidemail&uid=".$email);
      exit();
  }
  elseif($password !==$passwordRepeat){
    header("Location: ../signup.php?error=passwordchecked&uid=".$username."&email=".$email);
    exit();
  }
  else{
    $sql = "select uidUsers from users where uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../signup.php?error=sqlerror");
      exit();

    }
    else{
      mysqli_stmt_bind_param($stmt,"s",$username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck>0){
        header("Location: ../signup.php?error=userTaken");
        exit();
      }
      else{
        $sql = "Insert into users(uidUsers,emailUsers,pwdUsers) values(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else{
          $hashedpwd = password_hash($password,PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup_success.php?signup=success");
          exit();
          }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../signup.php");
        exit();
}

?>