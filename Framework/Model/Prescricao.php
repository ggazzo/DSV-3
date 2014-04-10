<?php
namespace Model;
class Prescricao extends ModelGeneric{
    public $collection = "Prescricao";
    public $params = array( 
                            "doctor"=>      array("type"=>"fk","params"=>"notnull"),
                            "pacient"=>     array("type"=>"fk","params"=>"notnull"),
                            "medicines"=>   array("type"=>"array","elements"=>
                                array(
                                
                                    array('medicamento'    => array("type"=>"fk","params"=>"notnull")),
                                    array('dosage'    => array("type"=>"number","params"=>"notnull")),
                                    array('duration'    => array("type"=>"number","params"=>"notnull"))
                                    
                                )
                            ),
                            "observation"=>      array("type"=>"longText","params"=>"notnull"),
                            "date"=>            array("type"=>"date","params"=>"notnull")
                            );
    public function getByPacient($id){		
		return $this->get(array("pacient"=>$id));
	}
}
?>