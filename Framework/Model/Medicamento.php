<?php
namespace Model;
class Medicamento extends ModelGeneric{
    public $collection = "Medicamento";
    public $params = array("name"=>array("type"=>"text","params"=>"notnull"));
}    
?>