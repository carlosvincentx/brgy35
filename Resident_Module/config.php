<?php
  $host = "sql211.infinityfree.com";
  $username = "if0_34365512";
  $password = "5X5BVXjt829";
  $conn = mysqli_connect($host, $username, $password) or die("Could not connect!\n");
  
  
  $database = "if0_34365512_brgy35";
  mysqli_select_db($conn, $database) or die ("Could not selec=t the database $database!\n". mysqli_error($conn));
  
?>