<?php
namespace Model;
class ExamType extends ModelGeneric{
    public $collection = "ExamType";
    public $params = array( 
                            "name"=>            array("type"=>"text",       "params"=>"notnull"),
                            "amb"=>             array("type"=>"number",     "params"=>"notnull"),
                            "ciefas"=>          array("type"=>"number",     "params"=>"notnull"),
                            "instructions"=>    array("type"=>"longtext",   "params"=>"notnull"),
                            "expectedResult"=>  array("type"=>"longtext",   "params"=>"notnull"),
                            "status"=>          array("type"=>"number"),    "params"=>"notnull")
                        );
}
?>