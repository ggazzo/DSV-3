<?php
namespace Controller;
class GenericCrudController{
    public $model;
    public $id;
	public $action;
	public $userType;
	private $req;

	public function setAction($a){	
		$this->action = $a;
	}

		public function __construct(){
		$l = \Login::getInstance();
		$this->userType = $l->userType();

		
		$this->model = "\\Model\\".ucfirst($this->model);		
		$this->req = isset($_REQUEST[$this->model])?$_REQUEST[$this->model]:arraY();
		if(isset($this->req['action'])||(!isset($this->action) || !$this->action))
            $this->action = isset($this->req['action'])? $this->req['action'] : "LISTAR"; 		
		$this->model = new $this->model();
	}    
    public function run(){
		    
		$m = $this->action;
        unset($this->req['action']);	
		
        $this->$m();
    }
    public function LISTAR(){   
        $u = new \View\User();

    	// isso aqui é uma view mas eu queria testar esse render (:
    	$u->setArea("container", \Utils\Module::_require(
            "ul.list-group
                each val, index in scope['a']
                    li.list-group-item= val.name
                        a.btn.btn-primary(href=\"/usuario/GET/\" + val['_id'])  EDIT
                        a.btn.btn-danger(href=\"/usuario/DELETE/\" + val['_id'])  DELETE"
    	,__DIR__,
    	__CLASS__,
    	"0.9"),
    	array("a"=>$m->getAll()));
        $u->generate();
    }
    public function GET(){
        $this->NOVO();
    }
    public function NOVO(){
        $u = new \View\User();
        $m = new $this->model();
        if($this->id){
           $m->getBy('_id',new \MongoId($this->id));
        }
        $f = new \Utils\Form($m);
        $u->setArea("container",$f->generate());
        $u->generate();
    }
    public function update(){
        $m = new $this->model();
        $m->getBy('_id',new \MongoId($this->id));
        $m->setAll($_REQUEST[$this->model]);
        $m->update();
        $this->GET();
    }
    public function SAVE(){
        header("location:/usuario/");
        $m = new $this->model();
        $m->setAll($_REQUEST[$this->model]);
        $m->save();
    }
    public function DELETE(){
        header("location:/usuario/");
        $m = new $this->model();
        $m->getBy('_id',new \MongoId($this->id));
        $m->remove();
    }    
}
?>