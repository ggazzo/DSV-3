<?php
namespace Model;
class ModelGeneric {
    public $values = array();
    public $params;
    private $database;
    public $collection;
    public $filter = array();
    public function __construct($coll= false){
        if($coll)
            $this->collection = $coll;
        $this->database = \Database::getCollection($this->collection);
    }
    
    public function setAll($arr) {
        foreach($arr as $key => $val)
            $this->values[$key] = $val;
    }
    public function set($index , $value) {
        $this->values[$index] = $value;
    }
    public function validate(){
        return true;
        foreach($this->params as $key => $val){
            foreach($val as $k => $v){
                if($v=="notnull"){
                    if(!isset($this->values[$key])){
                        echo "o campo {$key} é obrigatório";
                        return false;
                    }
                    
                }
            }
            
            
        }
        return true;
    }
    public function getBy($name,$value){
        

        $cursor = $this->database->findone(
            $this->extend(array(
                '_id' => new \MongoId($value)
            ))
        );
  
        if($cursor)
        
        
        foreach($cursor as $key => $val){
            $this->values[$key] = $val;
        }
        return $this;
    }
    public function findOne($arr){
        return $this->database->findone(
            $this->extend($arr)
        );
        
    }
    public function getAll(){
        return $this->database->find($this->filter);
    }
    public function save(){
        //salva 
        $this->database->insert($this->extend($this->values));

        //if($this->validate()){
          //  $this->database->insert($this->values);
        //}
    }
     public function update(){
        //salva 
        
        unset($this->values['id']);
        $this->database->update($this->extend(array('_id'=>new \MongoId($this->values['_id']))),$this->values);

        //if($this->validate()){
          //  $this->database->insert($this->values);
        //}
    }
         public function remove(){
        //salva 
        
        $this->database->remove($this->extend(array('_id'=>new \MongoId($this->values['_id']))));

        //if($this->validate()){
          //  $this->database->insert($this->values);
        //}
    }
    private function extend($arr){
        if(count($this->filter))
            foreach($this->filter as $key => $val)
                $arr[$key]= $val;
        return $arr;
    }
    
    
}  

?>