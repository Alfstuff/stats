<?php

class User extends DatabaseObjects {
	
	protected static $db_table = "users";
	
	protected static $db_table_fields = array('username','password','first_name','last_name','password');
	
	public $user_id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $userimage;
	public $uldir = "images";
	public $imageph = "http://placehold.it/400x400&text=image";
	
	public function show_userimage() {
		$out = empty($this->userimage) ? $this->imageph : "images/".$this->userimage;
		return $out;
	}
	
	
	public static function find_all_users() {
		
		/*
		global $database;
		$result_set = $database->query("SELECT * FROM users");
		return $result_set;
		*/
		
		// New method
		return self::query("SELECT * FROM users");

		
	}
	
		
	// Find user by ID
	public static function find_user_by_id($id) {
		global $database;
		
		// Old Way 
		/*
		$ubid = $database->query("SELECT * FROM users WHERE user_id = '$id' ");
		$uout = mysqli_fetch_array($ubid);
		return $uout;
		*/
		
		/* New Way */
		//$fid = self::find_this_query("SELECT * FROM users WHERE user_id = '$id' ");
		//$fout = mysqli_fetch_array($fid);
		//return $fout;
		
		// Newer Way
		//return self::find_this_query("SELECT * FROM users WHERE user_id = '$id' ");
		
		// query
		$the_result_array = self::find_this_query("SELECT * FROM users WHERE user_id = '$id' LIMIT 1 ");
		
		// Long way to get results
		/*
		var_dump($the_result_array);
					
		if (!empty($the_result_array)) {
			$first_item = array_shift($the_result_array);
			return $first_item;
		} else {
			return false;
		}
		*/
		
		// Short way to get results
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
		
		
		
	}
	
		
	
	// Verify the user data from login(u/p)
	public static function verify_user($username,$password) {
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		
		$sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1 ";
		
		$udata = self::find_this_query($sql);
		return !empty($udata) ? array_shift($udata) : false;
		
		
	}
	
	
	// Delete the user
	public function delete_user() {
		if ($this->delete('user_id')) {
			if ($this->userimage) {
				$delete_path = SITE_ROOT . DS . 'admin' . DS . 'images' . DS . $this->photo_filename;
				return unlink($delete_path) ? true : false;
			}
		} else {
			return false;
		}
	}
	
	
	// Update User
	public function update_user() {
		$this->update('user_id');
		return true;
	}
	
	// Add New User
	public function add_user() {
		$this->create();
		$this->set_file($_FILES);
		exit;
		return true;
	}
		
		
}


$user = new User();
$user->find_all_users();















?>