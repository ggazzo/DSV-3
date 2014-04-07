<?php
namespace Controller;

class UserController extends GenericCrudController{
    public $model = "User";    
}
/*
class UserController{
    private $id;
    public function __construct($_p){
        $this->id = $_p;
    }
    public function run($param,$m){
        if(isset($_REQUEST["\Model\User"]['action'])||(!isset($m) || !$m))
            $m = isset($_REQUEST["\Model\User"]['action'])? $_REQUEST["\Model\User"]['action'] : "LISTAR";
        if($m == "LISTAR" && $this->id){
            $m="GET";
        }
        unset($_REQUEST["\Model\User"]['action']);
        $this->$m();
    }
    public function LISTAR(){
        $m = new \Model\User();
        $u = new \View\User();

    	// isso aqui é uma view mas eu queria testar esse render (:
    	$u->setArea("container", \Utils\Module::_require(
            "ul.list-group
                each val, index in scope['a']
                    li.list-group-item= val.name
                        a.btn.btn-primary(href=\"/usuario/:GET/\" + val['_id'])  EDIT
                        a.btn.btn-danger(href=\"/usuario/:DELETE/\" + val['_id'])  DELETE"
    	,__DIR__,
    	__CLASS__,
    	"0.8"),
    	array("a"=>$m->getAll()));
        $u->generate();
    }
    public function GET(){
        
        $this->NOVO();
    }
    public function NOVO(){
        $u = new \View\User();
        $m = new \Model\User();
        if($this->id){
           $m->getBy('_id',new \MongoId($this->id));
        }
        $f = new \Utils\Form($m);
        $u->setArea("container",$f->generate());
        $u->generate();
    }
    public function update(){
        $m = new \Model\User();
        $m->getBy('_id',new \MongoId($this->id));
        $m->setAll($_REQUEST['\Model\User']);
        $m->update();
        $this->GET();
    }
    public function SAVE(){
        header("location:/usuario/");
        
        $m = new \Model\User();
        $m->setAll($_REQUEST['Model\User']);
        $m->save();
    }
    public function DELETE(){
        header("location:/usuario/");
        $m = new \Model\User();
        $m->getBy('_id',new \MongoId($this->id));
        $m->remove();
    }    
}*/
?>