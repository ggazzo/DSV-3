<?php
namespace Controller;
class LoginController{
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

    public function GET(){
        
        echo "auiaaa";
    }

}
?>