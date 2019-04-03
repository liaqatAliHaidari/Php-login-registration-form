
<?php
if(isset($_GET['error'])){
  if($_GET['error']=="emptyfields")
    echo "<p> Fill all fields</p>";
  else if($_GET['error']=="invalidmailuid")
    echo "<p> Please enter valid email or user id</p>";
  else if($_GET['error']=="invalidui")
    echo "<p> Please enter valid user id</p>";
   else if($_GET['error']=="invalidmail")
    echo "<p> Please enter valid email</p>";
  else if($_GET['error']=="passwordcheck")
    echo "<p> Password and confirm password should match.</p>";
    else if($_GET['error']=="usertaken")
    echo "<p> User name already exist.</p>";
}
// else if($_GET['signup']=="success"){
// echo "Sign up seccess";
// }
?>