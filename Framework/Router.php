<?php
class Router {
    private $paths = array();
    private $default;
    private $className;
    public function add($path, $class = false){

        $path = "/^\/".preg_replace("/(\/\*)/", "(/\w*)", $path)."/";
        echo $path."\n";
        //Terminar isso aqui ideia é caso o path da url seja o mesmo nome da classe não precisar passar o nome.
        /*if(!$class){
            $class = "\Controller\".
        }*/
        $class = "\\Controller\\".$class;
        $this->path[$path] = $class;
    }
    // classe de controle caso nenhuma url confira
    
    public function other($class){
        $this->default = $class;
    }
    public function run($path){
        $tmp;
        foreach($this->path as $key => $val){
            //aplicar expressão regular
            $class = $val[0];
            preg_match($key, $path, $output_array);
            if($output_array){
                $tmp = new $class($output_array[4]);
                $tmp->run(isset($output_array[4])?$output_array[4]:null,isset($output_array[3])?$output_array[3]:null);
                return true;
            }
        }
        return false;        
    }
    function  __destruct(){
        $tmp = $this->run($_SERVER["REQUEST_URI"]); 
        /*if(!$tmp){
            $tmp = $this->default;
            $tmp = new $tmp();
            return $tmp->run();
        }
        return $tmp;*/
    }
}
?>