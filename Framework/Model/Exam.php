<?php
namespace Model;
class Exam extends ModelGeneric{
    public $collection = "Exam";
    public $params = array( 
                            "examType"=>        array("type"=>"Exam",       "params"=>"notnull"),
                            "pacient"=>         array("type"=>"Paciente",   "params"=>"notnull"),
                            "requisition"=>     array("type"=>"date",       "params"=>"notnull"),
                            "doctor"=>          array("type"=>"Doctor",     "params"=>"notnull"),
                            "status"=>          array("type"=>"number"),    "params"=>"notnull"),
                            "execution"=>       array("type"=>"date",       "params"=>"optional"),
                            "result"            array("type"=>"longtext"),  "params"=>"optional"),
                            "report"            array("type"=>"longtext"),  "params"=>"optional")
                        );
}
?>
