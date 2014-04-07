<?php
namespace Controller;
class MedicamentoController{
    private $id;
    public function __construct($_p){
        $this->id = $_p;
    }
    public function run($param,$m){
        if(isset($_REQUEST["\Model\Medicamento"]['action'])||(!isset($m) || !$m))
            $m = isset($_REQUEST["\Model\Medicamento"]['action'])? $_REQUEST["\Model\Medicamento"]['action'] : "LISTAR";
        if($m == "LISTAR" && $this->id){
            $m="GET";
        }
        unset($_REQUEST["\Model\Medicamento"]['action']);
        $this->$m();
    }
    public function LISTAR(){
        $m = new \Model\Medicamento();
        $u = new \View\Medicamento();

    	// isso aqui é uma view mas eu queria testar esse render (:
    	$u->setArea("container", \Utils\Module::_require(
            "ul.list-group
                each val, index in scope['a']
                    li.list-group-item= val.name
                        a.btn.btn-primary(href=\"/medicamento/:GET/\" + val['_id'])  EDIT
                        a.btn.btn-danger(href=\"/medicamento/:DELETE/\" + val['_id'])  DELETE"
    	,__DIR__,
    	__CLASS__,
    	"0.6"),
    	array("a"=>$m->getAll()));
        $u->generate();
    }
    public function GET(){
        
        $this->NOVO();
    }
    public function NOVO(){
        $u = new \View\Medicamento();
        $m = new \Model\Medicamento();
        if($this->id){
           $m->getBy('_id',new \MongoId($this->id));
        }
        $f = new \Utils\Form($m);
        $u->setArea("container",$f->generate());
        $u->generate();
    }
    public function update(){
        $m = new \Model\Medicamento();
        $m->getBy('_id',new \MongoId($this->id));
        $m->setAll($_REQUEST['Model\Medicamento']);
        $m->update();
        $this->GET();
    }
    public function SAVE(){
        header("location:/medicamento/");
        $m = new \Model\Medicamento();
        print_r($_REQUEST);
        $m->setAll($_REQUEST['Model\Medicamento']);
        $m->save();
        
    }
    public function DELETE(){
        header("location:/medicamento/");
        $m = new \Model\Medicamento();
        $m->getBy('_id',new \MongoId($this->id));
        $m->remove();
    }    
}
?>