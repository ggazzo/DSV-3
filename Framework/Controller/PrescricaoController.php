<?php
namespace Controller;
class PrescricaoController{
    private $id;
    public function __construct($_p){
        $this->id = $_p;
    }
    public function run($param,$m){
        if(isset($_REQUEST["\Model\Prescricao"]['action'])||(!isset($m) || !$m))
            $m = isset($_REQUEST["\Model\Prescricao"]['action'])? $_REQUEST["\Model\Prescricao"]['action'] : "LISTAR";
        if($m == "LISTAR" && $this->id){
            $m="GET";
        }
        unset($_REQUEST["\Model\Prescricao"]['action']);
        $this->$m();
    }
    public function LISTAR(){
        $m = new \Model\Prescricao();
        $u = new \View\User();

    	// isso aqui é uma view mas eu queria testar esse render (:
    	$u->setArea("container", \Utils\Module::_require(
            "ul.list-group
                each val, index in scope['a']
                    li.list-group-item= val.firstName
                        a.btn.btn-primary(href=\"/usuario/:GET/\" + val['_id'])  EDIT
                        a.btn.btn-danger(href=\"/usuario/:DELETE/\" + val['_id'])  DELETE"
    	,__DIR__,
    	__CLASS__,
    	"0.5"),
    	array("a"=>$m->getAll()));
        $u->generate();
    }
    public function GET(){
        
        $this->NOVO();
    }
    public function NOVO(){
        $u = new \View\User();
        $m = new \Model\Prescricao();
        if($this->id){
           $m->getBy('_id',new \MongoId($this->id));
        }
        $f = new \Utils\Form($m);
        $u->setArea("container",$f->generate());
        $u->generate();
    }
    public function update(){
        $m = new \Model\Prescricao();
        $m->getBy('_id',new \MongoId($this->id));
        $m->setAll($_REQUEST['Model\Prescricao']);
        $m->update();
        $this->GET();
    }
    public function SAVE(){
        //header("location:/usuario/");
        
        $m = new \Model\Prescricao();
        print_r($_REQUEST);
        $m->setAll($_REQUEST['Model\Prescricao']);
        $m->save();
    }
    public function DELETE(){
        header("location:/usuario/");
        $m = new \Model\Prescricao();
        $m->getBy('_id',new \MongoId($this->id));
        $m->remove();
    }    
}
?>