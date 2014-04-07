<?php

namespace Utils;
class Dic{
    private $vars;
    public function setLang($lang){
        $this->vars = parse_ini_file("{$_SERVER['DOCUMENT_ROOT']}/DSV-3/cliente/dicionario_${lang}.inc");
    }
    public function getWord($str){
        return $this->vars[$str] ? $this->vars[$str] : "'${str}' não definida";
    }
}
?>
