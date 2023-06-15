<?php

$servername = "sql211.infinityfree.com";
$username = "if0_34365512";
$password = "5X5BVXjt829";
$database = "if0_34365512_brgy35";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

 ?>

<style>
    #chat3 .form-control {
border-color: transparent;
}

#chat3 .form-control:focus {
border-color: transparent;
box-shadow: inset 0px 0px 0px 1px transparent;
}


</style>


 

<style>
  #chat1 .form-control {
    border-color: transparent;
  }

  #chat1 .form-control:focus {
    border-color: transparent;
    box-shadow: inset 0px 0px 0px 1px transparent;
  }


  #chat1 {
    height: 400px;
    overflow-y: auto;
    border-radius: 15px;
  }
</style>






<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>

    <div class="container my-5 text-center">
        <h2>Inbox</h2>
        <br>
    </div>
    <section  >
        <div class="container py-5">
            <div class="col-md-12 mx-auto">
                <div class="card" id="chat3" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="position: relative; height: 500px">
       