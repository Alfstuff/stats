<?php
// Check if logged in
if (!$session->signed_in) { 
	redirect("/login"); 
	//echo "not logged in.";
	//exit;
}



?>