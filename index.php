<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
    // Faz os includes automaticos (sempre para dentro da pasta Framework)
    spl_autoload_register(function($class) {
		include_once("/Framework/" . str_replace("\\", "/", $class) . '.php');
    });


    $l = Login::getInstance();
    // App fechado todas url precisam de login
    if($l->is_logged()){
        
        $r = new Router();

        //Adiciona as rotas

        $r->add("main",'MainController',function($controller){			
			$controller();
        });
        
		
		$r->add("usuario/*/*",'UserController',function($controller , $args){			
			$controller->setAction($args[0]);
			$controller->setId($args[1]);
			$controller();
        });
        $r->add("usuario/*",'UserController',function($controller , $args){
			$controller->setAction($args[0]);
			$controller();
        });
		$r->add("usuario",'UserController',function($controller){		
			$controller();
        });
		
		
		
		
		
		
		/*
			1º id do paciente
			2º metodo
			3º id da prescrição
		*/
        $r->add("prescricao/user/*",'PrescricaoController',function($controller , $args){
			$l = Login::getInstance();
						// Lista prescrição do paciente						
			$controller->setAction("listByUser");				
			$controller->setUserId($args[0]);
					$controller();
		});		
		/*
			Tela que solicita o paciente
		*/
        $r->add("prescricao",'PrescricaoController',function($controller , $args){        
		
			$l = Login::getInstance();			
			if($l->userType()==3){ //paciente
			// Lista prescrição do paciente
				$controller->setAction("listByUser");				
				$controller->setUserId((string)$l->get('_id'));
			}else {
			// Solicita informar paciente
				$controller->setAction("FIND_USER");			
			}
			$controller();
		});

        $r->add("medicamento/*/*",'MedicamentoController',function($action , $id){
        
        });
    
    }else{
        $v = new \View\Login();
        $v->generate();
    }
?>