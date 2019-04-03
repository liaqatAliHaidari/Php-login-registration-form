<?php
if (isset ($_POST['login-submit']))
{
  require 'dbh.inc.php';
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty ($mailuid) || empty ($password))
  {
    header("Location: ../index.php?error=emptyfaileds");
    exit();
  }
  else
  {
    $sql = "select * from users where uidUsers =? OR emailUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else
    {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result))
      {
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        if ($pwdCheck == false)
        {
          header("Location: ../index.php?error=WringPwd");
          exit();
        }
        else if ($pwdCheck == true)
        {
          session_start();
          $_SESSION['userId'] = $row['idUser'];
          $_SESSION['userUid'] = $row['uidUsers'];
          header("Location: ../login_success.php?login=success");
          exit();
        }
        else
        {
          header("Location: ../index.php?error=wrongPwd");
          exit();
        }
      }
      else
      {
        header("Location: ../index.php?error=noUser");
        exit();
      }
    }
  }


}
else
{
  header("Location: ../index.php");
  exit();
}

?>