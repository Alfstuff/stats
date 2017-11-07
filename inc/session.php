<?php
class Session {
	
	public $signed_in = false;
	public $userid;
		
	// construct
	function __construct() {
		session_start();
		$this->check_login();
		$this->check_message();
	}
	
	// Getter for status
	public function is_signed_in() {
		return $this->signed_in;
	}
	
	// login
	public function login($user_found) {
		if ($user_found) {
			$this->userid = $_SESSION['user_id'] = $user_found->user_id;
			$this->signed_in = true;
		}
	}
	
	// logout
	public function logout($user) {
			unset($_SESSION['user_id']);
			unset($this->userid);
			$this->signed_in = false;
	}
	
	// Check login
	private function check_login() {
		if (isset($_SESSION['user_id'])) {
			$this->userid = $_SESSION['user_id'];
			$this->signed_in = true;
		} else {
			unset($this->userid);
			$this->signed_in = false;
		}
	}
	
	// Message deliverer
	public function message($msg="") {
		if (!empty($msg)) {	
			$_SESSION['message'] = $msg;
		} else {
			$this->message = "";
		}
	}
	
	// Message setter and remove from session.  why is this 2 functions?
	public function check_message() {
		if (isset($_SESSION['message'])) {
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			$this->message = "";	
		}
	}
	
	
}

$session = new Session();
?>