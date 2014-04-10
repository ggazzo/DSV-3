<?php
class Session{
	private static $instance;
	public function __construct(){
		session_start();
	}
	public function free(){
		$_SESSION = array();
		session_destroy();
	}
	public function setValue($key, $value){
		$_SESSION[$key] = $value;
	}
	public function getValue($key){
		if(isset($_SESSION[$key])){
		    return $_SESSION[$key];
		}
		return '';
	}
	public static function getInstance(){
		if(empty(self::$instance))
			self::$instance = new Session();
		return self::$instance;
	}
}
?>