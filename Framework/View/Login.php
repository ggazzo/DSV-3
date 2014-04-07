<?php

namespace View;
class Login{
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
                    .col-md-4.col-md-offset-4
                        :php
                            \Utils\Message::generate('login');
                        form.form-signin(role=form,method='POST')
                            h2.form-signin-heading Please sign in
                            input(type='hidden', name='login[action]', value='login').form-control
                            input(type='text', placeholder='Login', required='', autofocus='', name='login[username]').form-control
                            input(type='password', placeholder='Password', required='', name='login[password]').form-control
                            button.btn.btn-lg.btn-primary.btn-block(type='submit') Sign in
        "
    	,__DIR__,
    	__CLASS__,
    	"0.9.3");
    }

}
?>