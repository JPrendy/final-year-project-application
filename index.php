<?php
    include 'header.php';
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="header"> 
	<h1>Register, login and logout user php mysql</h1>
</div>


<form action="includes/login.inc.php" method="POST">
<input type="text" name="uid" placeholder="Username">
<input type="password" name="pwd" placeholder="Password">
<button type="submit" name="login_button"> Login </button>

</form>

<?php 
    if (isset($_SESSION['id'])){
		echo $_SESSION['id'];
		
	}
	else {
		echo "You are not logged in!";
	}

?>
<br>
</br>

       <form action="includes/signup.inc.php" method="POST">
	      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
    </div>
	<br>
	<br>

	     <input type="text" name="first" placeholder="Firstname">
		 <input type="text" name="last" placeholder="Lastname">
		 <input type="text" name="uid" placeholder="Username">
		 <input type="password" name="pwd" id="pwd" placeholder="Password">
		 	 <input type="password" name="pwd2" id="pwd2" placeholder="Reconfirm Password">
		 <button type="button" id="eye">
    <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
</button>
		 <button type="submit" class="btn btn-primary btn-xs" name="register_btn"> SIGN UP </button>
		 </form>
		 
		 
		 <br></br>
		 <form action="includes/logout.inc.php">
		 <button>LOG OUT</button>
		 </form>
		 
		 
		   <!--this is used to make the calculator to work-->
    <script src="password.js"></script> <!--this is an example of place where you can put the javascript file-->
</body>
</html>