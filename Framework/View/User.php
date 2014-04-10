<?php

namespace View;
class User extends GenericView{

	public function toList($area="container",$scope){	
		return $this->setArea($area, \Utils\Module::_require(
            "ul.list-group
                each val, index in scope['a']
                    li.list-group-item= val.name
                        a.btn.btn-primary(href=\"/usuario/GET/\" + val['_id'])  EDIT
                        a.btn.btn-danger(href=\"/usuario/DELETE/\" + val['_id'])  DELETE"
    	,__DIR__,
    	__CLASS__,
    	"0.9"),$scope);
	}
}
?>