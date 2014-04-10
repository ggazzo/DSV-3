<?php

class Login {
	private static $instance;
	private $db;
	private $session;
	private $tmp;
	
	public function __construct(){

	        $req =isset($_REQUEST['login'])?$_REQUEST['login']:array();
			$this->session = Session::getInstance();
	           		
			if(isset($req['action'])){
    			switch($req['action']){
    				case 'login':
    				    $dic = new \Utils\Dic();
                        $dic->setLang('pt');
                         
    					if(isset($req['username']) && isset($req['password'])){
    					    $c = new \Model\User();
    					 	$this->tmp = $c->findOne(array("username"=>$req['username'],"password"=>$req['password']));							
        					if(isset($this->tmp)){
        					    
        						$this->session->setValue("username",$req['username']);
        						$this->session->setValue("userType",$this->tmp['userType']);
        						\Utils\Message::setMessage("login","Bem vindo!","info");
        					}else{
        						\Utils\Message::setMessage("login",$dic->getWord("login_error"),"danger");						
        					}
    					}
    					break;
    				case 'logoff':					
    					$this->logoff();
    					\Utils\Message::setMessage("login","Deslogado com sucesso!","sucess");
    					break;
    			    default:
    			}
			}
	}
	public function userType(){
		return ($this->session->getValue("userType")!= '')? $this->session->getValue("userType"):0;
	}
	public function get($a){
		return (isset($this->tmp[$a])? $this->tmp[$a]: null);
	}
	public function is_logged(){
		return ($this->session->getValue("username")!= '')? true:false;
	}
	
	public function logoff(){
		$this->session->free();
		$this->session = null;		
	}
	public static function getInstance(){
		if(empty(self::$instance))
			self::$instance = new Login();
		return self::$instance;
	}
}

?>