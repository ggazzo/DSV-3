<?php
namespace Model;
class User extends ModelGeneric{
    public $collection = "user";
    public $params = array( "username"=>        array("type"=>"text","params"=>"notnull"),
                            "password"=>        array("type"=>"password","params"=>"notnull"),
                            "inclusionDate"=>   array("type"=>"date","params"=>"notnull"),
                            "name"=>       array("type"=>"text","params"=>"notnull"),
                            "secondName"=>      array("type"=>"text","params"=>"notnull"),
                            "surName"=>         array("type"=>"text","params"=>"notnull"),
                            "birthday"=>        array("type"=>"date","params"=>"notnull"),
                            "gender"=>          array("type"=>"fk","params"=>""),
                            "motherName"=>      array("type"=>"text","params"=>""),
                            "fatherName"=>      array("type"=>"text","params"=>""),
                            "nationality"=>     array("type"=>"text","params"=>"notnull"),
                            "ethnicity"=>       array("type"=>"text","params"=>"notnull"),
                            "religion"=>        array("type"=>"text","params"=>"notnull"),
                            "maritalStatus"=>   array("type"=>"text","params"=>"notnull"),
                            "bloodGroup"=>      array("optional", "fk"),
                            "covenant"=>        array("optional", "fk"),
                            "deathIndicator"=>  array("type"=>"boolean","params"=>""),
                            "documents"=>       array("notnull",  "fk"),
                            "address"=>         array("notnull",  "fk"),
                            "personalContact"=> array("optional", "fk"),
                            "contacts"=>        array("optional", "fk"),
                            "userType"=>        array("type"=>"fk"),
                            "profession"=>      array("optional", "fk"));
                            
}
?>