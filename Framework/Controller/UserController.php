<?php
namespace Controller;

class UserController extends GenericCrudController{
    public $model = "\Model\User";
	public $userType;
	public $action;
	public function __construct(){
		$l = \Login::getInstance();
		$this->userType = $l->userType();
		$this->action = isset($_REQUEST["\Model\User"]['action'])? $_REQUEST["\Model\User"]['action'] : "LISTAR";
    }
	public function setAction($a){	
		$this->action = $a;
	}
	public function setId($a){	
		$this->id = $a;
	}

    public function __invoke(){	
		if($this->userType == 2){ //medico			
			parent::run();
		}else{			
			echo "pagina não disponivel";
		}	
	}
}
?>