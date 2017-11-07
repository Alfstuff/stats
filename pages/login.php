<?php
if ($session->is_signed_in()) {
	echo "logged in";
	//redirect("/home");	
}

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
		
	// check db user
	$user_found = User::verify_user($username,$password);
		
	// Do login
	if ($user_found) {
		$session->login($user_found);
		redirect("/home");
	} else {
		$message = "Invalid Login";
		$session->message = $message;
	}
	
} else {
	// No data inputted
	$username = null;
	$password = null;
}

?>


<div class="col-md-4 col-md-offset-3">
	<h4 class="bg-danger"><?php echo $session->message; ?></h4>
	<form id="login-id" action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">        
        </div>
    
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
	</form>
</div>
