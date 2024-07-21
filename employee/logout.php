<?php
 include("../model/conn.php");


 session_unset();

 session_destroy();

  echo "<script>alert('Logout Successful!');window.location.href='login.php';</script>";

?>