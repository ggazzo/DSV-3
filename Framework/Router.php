<?php
class Router {
    private $paths = array();
    private $default;
    private $className;
    public function add($path, $class , $func){
        $path = preg_replace("/((\/)([^\*]))/", "\/$3", $path);
        $path = "/\/".preg_replace("/(\/\*)/", "\/(\w*)", $path)."/";        
        //Terminar isso aqui ideia é caso o path da url seja o mesmo nome da classe não precisar passar o nome.
        /*if(!$class){
            $class = "\Controller\".
        }*/
        $class = "\\Controller\\".$class;
        $this->path[$path] = $class;
        $this->func[$path] = $func;
    }
    // classe de controle caso nenhuma url confira
    
    public function other($class){
        $this->default = $class;
    }
    public function run($path){
        $tmp;
        foreach($this->path as $key => $val){            
            $class = $val;
            preg_match($key, $path, $output_array);	
            if($output_array){			
				$callback =  $this->func[$key];
                $controller = new $class();
				array_shift($output_array);											
				if(call_user_func_array($callback, array($controller,$output_array)) !== false){
					return true;
				};
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