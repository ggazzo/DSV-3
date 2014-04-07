<?php

class Login {
	private static $instance;
	private $db;
	private $session;
	
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
    					 	$tmp = $c->findOne(array("username"=>$req['username'],"password"=>$req['password']));

        					if($tmp){
        					    
        						$this->session->setValue("username",$req['username']);
        						\Utils\Message::setMessage("login","Bem vindo!","info");
        					}else{
        						\Utils\Message::setMessage("login",$dic->getWord("login_error"),"danger");						
        					}
    					}
    					break;
    				case 'logoff':					
    					$this->logoff();
    					//\libs\Message::getInstance()->setMessage("login","Deslogado com sucesso!","sucess");
    					break;
    			    default:
    			}
			}
	}
	public function is_logged(){
		return ($this->session->getValue("username")!= '')? true:false;
	}
	public function logoff(){
		$this->session->free();
		$this->session = null;		
	}
	public static function getInstance($req){
		if(empty(self::$instance))
			self::$instance = new Login($req);
		return self::$instance;
	}
}

?>