<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
    // Faz os includes automaticos (sempre para dentro da pasta Framework)
    spl_autoload_register(function($class) {
    	include_once("./Framework/" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php');
    });


    $l = new Login();
    // App fechado todas url precisam de login
    if($l->is_logged()){
        
        $r = new Router();

        //Adiciona as rotas

        $r->add("main",'MainController',function($action , $id){
        
        });
        $r->add("usuario/*/*",'UserController',function($action , $id){
        
        });
        $r->add("prescricao/*/*",'PrescricaoController',function($action , $id){
        
        });
        $r->add("medicamento/*/*",'MedicamentoController',function($action , $id){
        
        });
    
    }else{
        $v = new \View\Login();
        $v->generate();
    }

?>