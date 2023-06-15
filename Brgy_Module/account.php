 <?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update button clicked, handle the update logic here
// Update button clicked, handle the update logic here
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$oldPassword = $_POST['old_password']; // New line: Get the value of the old password field

// Retrieve the old password from the database
$query = "SELECT password FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$storedPassword = $row['password'];

// Verify the old password
if (password_verify($oldPassword, $storedPassword)) {
    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update query
    $query = "UPDATE users SET username = '$username', email = '$email', password = '$hashedPassword' WHERE id = $id";
    mysqli_query($conn, $query);

    // Redirect to the page after updating
    header("Location: account.php");
    exit();
} else {
    $errorMessage = "Old password verification failed."; // New line: Set an error message
}

}

include "header.php";

$searched_user_id = ucwords($_SESSION['user_id']);
$query = "SELECT * FROM users WHERE id = '$searched_user_id'";
$result = mysqli_query($conn, $query);

$user_data = json_decode($class->get_user_data_admin($_SESSION['user_id']));
if ($user_data->status) {
    $user = $user_data->data;
    $_SESSION['user_login'] = 1;
    $_SESSION['user_id'] = $user->id;
    $_SESSION['username'] = $user->username;
    // Assign any other necessary session variables
}
?>


<style>


label{
color:#fff; 
}
</style>
<section class="home-section" style = "height:100vh;">
    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>


  <div class="center" style = "background-color:rgba(73,73,73, 0.5);   border-radius: 10px; padding:20px;margin-top:50px">
    <b>Account</b>
    
    <div id="container">
      <div id="left-nav">
        <div class="user-details">
        </div>
      </div>

      <div id="right-nav">
        <h1>Personal Information</h1>
        <hr />
        <br />

        <?php


        function fetchUserDetails($result, $id) {
            $rowColor = '#494949'; // Initial row color
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='background-color: $rowColor;'>";
                echo "<td style='color:#fff;'>".$row['username']."</td>";
                echo "<td style='color:#fff;'>".$row['email']."</td>";
                echo "<td ><a style='color:#fff;' href='edit.php?id=".$row['id']."'>Edit</a></td>";
                echo "</tr>";
                echo "<tr id='edit-row-".$row['id']."' style='display: none; background-color: $rowColor;'>";
                echo "<td colspan='4'>";
                echo "<form method='POST' action='account.php'>";
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                echo "<div class='form-group'>";
                echo "<label for='username'>Username</label>";
                echo "<input type='text' class='form-control' name='username' value='".$row['username']."'>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='email'>Email</label>";
                echo "<input type='email' class='form-control' name='email' value='".$row['email']."'>";
                echo "</div>";
                echo "<div class='form-group'>";
echo "<label for='old_password'>Old Password</label>";
echo "<input type='password' class='form-control' name='old_password'>";
echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='password'>New Password</label>";
                echo "<input type='password' class='form-control' name='password'>";
                echo "</div>";
                echo "<button style='font-family: 'Roboto', sans-serif;' type='submit' class='btn btn-primary'>Update</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";

                // Alternate the row color
                $rowColor = ($rowColor == '#494949') ? 'white' : '#494949';
            }

        
            // Display the updated data immediately
        
        }

        if (isset($errorMessage)) {
          echo "<p style='color: red;'>$errorMessage</p>";
      }
      

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Username</th><th>Email</th><th>Edit</th></tr></thead>";
            echo "<tbody>";

            

           $searched_user_id = ucwords($_SESSION['user_id']);
            fetchUserDetails($result, $searched_user_id); // Pass the updated 'id' to the function

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No results found.";
        }
        ?>
      </div>
    </div>
  </div>
</section>

</div>

<script>
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e) => {
    let arrowParent = e.target.parentElement.parentElement;
    arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

let editLinks = document.querySelectorAll("a[href^='edit.php?id=']");
editLinks.forEach((editLink) => {
  editLink.addEventListener("click", (e) => {
    e.preventDefault();
    let rowId = editLink.getAttribute("href").split("=")[1];
    let editRow = document.getElementById("edit-row-" + rowId);
    editRow.style.display = "table-row";
  });
});
</script>
</body>
</html>
