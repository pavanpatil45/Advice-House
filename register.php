<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="js/jquery-2.2.4.min.js"></script>
    <title>PHP login system!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>

      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<form >

<div class="alert alert-danger" role="alert" id="reg-error" style="display: none;">
	</div>
  <div class="alert alert-success" role="alert" id="suc" style="display: none;">Registration Successful!
	</div>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control"  id="inputEmail" name="inputEmail" placeholder="Email" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control"  id="inputUsername" name="inputUsername" placeholder="Username" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control"  id="inputPassword" name="inputPassword" placeholder="Password" required="">
    </div>
  </div>
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="confirm_password" placeholder="Confirm Password" required="">
    </div>
  <div class="form-group">
    <label for="inputAddress2">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Apartment, studio, or floor" required="">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id ="inputCity" name="inputCity" required="">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="inputState" class="form-control" required="">
        <option selected>maharashtra</option>
        <option selected>UP</option>
        <option selected>Bihar</option>
        <option selected>Hariyana</option>
      </select>


    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="number" class="form-control" id="inputZip" name="inputZip" required="" >
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required="">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div id="formresult"> </div>
  <div class="inputfield">
    <input type="button" value="Register" class="btn btn-primary" id="register" name="register">
	</div>
</form>

<script>
			$(document).ready(function() {
				$('#register').click(function() {
				
          var email = $('#inputEmail').val();
          var username = $('#inputUsername').val();
          var password = $('#inputPassword').val();
        	var confirm_password = $('#confirm_password').val();
          var addr = $('#inputAddress').val();
          var city = $('#inputCity').val();
          var state = $('#inputState').val();
          var zip = $('#inputZip').val();

    	$.ajax({
						url: "process_reg.php",
						method: "POST",
						data: {email:email, username:username, password:password, confirm_password:confirm_password, addr:addr, city:city, state:state, zip:zip},
						success: function(error) {
							if(error == 0) {
							
							$('#reg-error').hide();
              $('#suc').show();
             
								
							}
							else {
								document.getElementById("reg-error").innerHTML = error;
								document.getElementById("reg-error").style.display = "block";
							}
						}
					});
				});
			});
		</script>




</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>

