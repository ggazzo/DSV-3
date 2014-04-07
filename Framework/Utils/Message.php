<?php
namespace Utils;
class Message{
	private static $message = array();

	public static function setMessage($context, $value, $status = 'primary'){
	    
		self::$message[$context]['text'] = $value;
		self::$message[$context]['status'] = $status;
	}

	public static function getMessage($key){
		return self::$message[$key];
	}

	public static function generate($context){
	    if(isset(self::$message[$context]))
    	    echo "<div class=\"alert alert-".self::$message[$context]['status']."\">".self::$message[$context]['text']."</div>";
	}

}
?>