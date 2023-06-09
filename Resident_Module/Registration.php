<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../includes/Auth.php";
include "../includes/MainClass.php";
include "../includes/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register = json_decode($class->register());
    if ($register->status == 'success') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = json_decode($class->login_resident($email, $password));
        if($login->status == 'success'){
            $_SESSION['flashdata']['type'] = 'success';
            $_SESSION['flashdata']['msg'] = 'Account has been registered successfully.';
            header("Location: Login_verification.php");
            exit;
        }else{
            $_SESSION['flashdata']['type'] = 'danger';
            $_SESSION['flashdata']['msg'] = 'An error occurred while logging in. Please try again later.';
            header("Location: index.php");
            exit;
        }
    } elseif ($register->status == 'failed') {
      $_SESSION['flashdata']['type']='danger';
      $_SESSION['flashdata']['msg'] = ' Email already exists.';
        echo "<script>console.error(".json_encode($register).");</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.2.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../Font-Awesome-master/js/all.min.js"></script>
	<link rel = "icon" href = "./img/brgylogo.png">
  	<title>Barangay 35 | Registration</title>
</head>
<body class="image">
    <main class = "main">
	<div class="card-body py-5"></div>
        <div class = "col-lg-4 col-md-8 col-sm-12">
            <div class="card shadow rounded-3">
                <div class="card-title text-start2">
                    <form>
					<div class="clear-fix mb-2"></div>
                    <img class="Inline" src = "img/brgylogo.png" height="25%" width="25%">
                    <h2 class="Inline"><b>&nbsp;Registration</b></h2>
                    </form>
                </div>
				<div class="card-body py-2">
					<div class="container-fluid">
						<form action="Registration.php" method="POST">
						<?php 
                            if(isset($_SESSION['flashdata'])):
                        ?>
                        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?> my-2 rounded-0">
                            <div class="d-flex align-items-center">
                                <div class="col-11"><?php echo $_SESSION['flashdata']['msg'] ?></div>
                                <div class="col-1 text-end">
                                    <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['flashdata']) ?>
                        <?php endif; ?>
							<div class="form-group">
								<input size="40" type="text" name="username" id="username" class="form-control rounded-0" placeholder="Fullname" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" autofocus required>
							</div>
							<br>
							<div class="form-group">
              <input size="40" type="email" name="email" id="email" class="form-control rounded-0" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" autofocus required pattern=".*@gmail\.com$" title="Email should end with @gmail.com">
	</div>
							<br>
							<div class="form-group">
                               <input size="40" type="password" name="password" id="password" class="form-control rounded-0" placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            </div>
							<br>
							<div class="form-group">
								<input size="40" type="password" name="cpassword" id="cpassword" class="form-control rounded-0" placeholder="Confirm Password" required>
							</div>
							<br>
							
<style>
  /* Styling for the dialog */
  .dialog-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
  }

  .dialog-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }

  /* Additional styles for the button */
  .form-check-label {
    display: inline-flex;
    align-items: center;
    background: transparent;
    border: none;
    cursor: pointer;
    outline: none;
    padding: 0;
  }

  .form-check-input {
    margin-right: 5px;
  }
</style>
<div class="col-12">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
    <!-- Button trigger modal -->
    <label class="form-check-label" for="invalidCheck" id="openModalBtn">
    Data Privacy Consent
    </label>
    <div class="invalid-feedback">
      You must agree before submitting.
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Data Privacy Consent</h5>
         </button>
      </div>
      <div class="modal-body">
	  We value and protect your personal information in compliance with the Data Privacy Act of 2012 (RA 10173). By agreeing to our Data Privacy Consent, you allow to share your Personal Information includes any information such as Name, Email Address, etc. All data will be kept secure and confidential by the Barangay 35 Zone 3, District 1 and the City of Manila only. The information will serve as a reference for communication and will be used only for the purpose of this system. Any personal information will not be disclosed without your consent.
      </div>
    
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Show the dialog when the openModalBtn is clicked
    $('#openModalBtn').on('click', function(e) {
      e.preventDefault();
        $('#exampleModalCenter').modal('show');
    
    });

    // Center the dialog vertically and horizontally
    function centerDialog() {
      var dialogHeight = $('.modal-dialog').outerHeight();
      var windowHeight = $(window).height();
      var dialogTop = Math.max(0, (windowHeight - dialogHeight) / 2);
     }

    // Center the dialog on window resize
    $(window).on('resize', function() {
      centerDialog();
    });

    // Initially center the dialog
    centerDialog();
  });
</script>

							<br>
							<div class="form-group">
                                <button class="btn btn-primary bg-gradient rounded-3">Register</button>
                            </div>     
							<br>
							<div>
								<p class="Inline">Already have an Account?</p>
								<a href="/" class="Inline">Login Here</a>
							</div>
							<hr>
							<div id="message">
								<h6>Password must contain the following:</h6>
									<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
									<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
									<p id="number" class="invalid">A <b>number</b></p>
									<p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>

<script>
	var myInput = document.getElementById("password");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");
	var password = document.getElementById("password")
  , cpassword = document.getElementById("cpassword");

	// When the user clicks on the password field, show the message box
	myInput.onfocus = function() {
	document.getElementById("message").style.display = "block";
	}

	// When the user clicks outside of the password field, hide the message box
	myInput.onblur = function() {
	document.getElementById("message").style.display = "none";
	}

	// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
	// Validate lowercase letters
	var lowerCaseLetters = /[a-z]/g;
	if(myInput.value.match(lowerCaseLetters)) {
		letter.classList.remove("invalid");
		letter.classList.add("valid");
	} else {
		letter.classList.remove("valid");
		letter.classList.add("invalid");
	}

	// Validate capital letters
	var upperCaseLetters = /[A-Z]/g;
	if(myInput.value.match(upperCaseLetters)) {
		capital.classList.remove("invalid");
		capital.classList.add("valid");
	} else {
		capital.classList.remove("valid");
		capital.classList.add("invalid");
	}

	// Validate numbers
	var numbers = /[0-9]/g;
	if(myInput.value.match(numbers)) {
		number.classList.remove("invalid");
		number.classList.add("valid");
	} else {
		number.classList.remove("valid");
		number.classList.add("invalid");
	}

	// Validate length
	if(myInput.value.length >= 8) {
		length.classList.remove("invalid");
		length.classList.add("valid");
	} else {
		length.classList.remove("valid");
		length.classList.add("invalid");
	}
	
	function validatePassword(){
	if(myInput.value != cpassword.value) {
		cpassword.setCustomValidity("Passwords Don't Match");
		} else {
		cpassword.setCustomValidity('');
		}
	}

	myInput.onchange = validatePassword;
	cpassword.onkeyup = validatePassword;
}
</script>
</body>
</html>