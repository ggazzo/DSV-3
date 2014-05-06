<?php
namespace Controller;

class PrescricaoController extends GenericCrudController{
    public $model = "Prescricao";
	public $userId;
	
	public function setUserId($id){
		$this->userId = $id;
	}
	public function FIND_USER(){
		$u = new \View\User();
		$u->findUser();		
		$u->generate();
	}
	public function listByUser(){		
		$u = new \View\User();
		$u->toList("container", array("a"=>$this->model->getByPacient($this->userId)));		
		$u->generate();
	}
	
    public function __invoke(){					
			parent::run();		
	}
}
?>