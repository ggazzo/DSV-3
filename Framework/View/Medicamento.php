<?php

namespace View;
class Medicamento{
    public $container;
    private $areas = array();
    private $scopes = array();
    public function getArea($a){
        if(isset($this->areas[$a])){
            foreach($this->areas[$a] as $key => $val){
                if($this->scopes[$a][$key]){
                    $scope = $this->scopes[$a][$key];
                    include $val;
                }else{
                    echo $val;
                }
            }
        }
    }
    public function setArea($a, $v, $s=false){
        $this->areas[$a][]=$v;
        $this->scopes[$a][]=(isset($s)?$s:false);
    }
    public function generate(){

    	include \Utils\Module::_require(
        "html(lang='en')
            head
                meta(charset='utf-8')
                meta(http-equiv='X-UA-Compatible', content='IE=edge')
                meta(name='viewport', content='width=device-width, initial-scale=1')
                meta(name='description', content='')
                meta(name='author', content='')
                link(rel='shortcut icon', href='../../assets/ico/favicon.ico')
                title Narrow Jumbotron Template for Bootstrap
                //
                   Bootstrap core CSS 
                link(href='/Framework/_css/bootstrap.min.css', rel='stylesheet')
                //
                   Just for debugging purposes. Don't actually copy this line! 
                //if lt IE 9
                  script(src='../../assets/js/ie8-responsive-file-warning.js')
                //
                   HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries 
                //if lt IE 9
                  script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
                  script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
            body
                .container
                    :php
                        \$this->getArea('container');
        "
    	,__DIR__,
    	__CLASS__,
    	"0.3");
    }

}
?>