<?php

class Form {
    private $m;
    private $c;
    public function __construct($model){
        $this->m = $model;
        $this->c = $model->collection;
    }
    public function generate(){
        echo "<form>";
        foreach($this->m as $key=> $val){
            $this->generateElement($val);
        }
        
        echo "</form>";
        
    }
    private function generateElement($val){
        if(preg_match("(text|date)",$val['type'])){
            echo "<input name=\"{$this->c}[{$key}]\"/>";
        }
        
    }
}  
?>