<?php

namespace View;
class User extends GenericView{
	public function findUser(){
		return $this->setArea("container", \Utils\Module::_require(
            "form(action=\"http://somesite.com/prog/adduser\")
				label nome do paciente
				input
			"
    	,__DIR__,
    	__CLASS__,
    	"findUser_0.91"),array('a'=>'a'));
	
	
	}
	public function toList($area="container",$scope){	
		return $this->setArea($area, \Utils\Module::_require(
            "ul.list-group
                each val, index in scope['a']
                    li.list-group-item= val.name
                        a.btn.btn-primary(href=\"/usuario/GET/\" + val['_id'])  EDIT
                        a.btn.btn-danger(href=\"/usuario/DELETE/\" + val['_id'])  DELETE"
    	,__DIR__,
    	__CLASS__,
    	"toList_0.9"),$scope);
	}
}
?>