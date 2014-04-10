<?php
namespace Utils;
class Form{
    private $default = array(
        'METHOD'=>"POST",
        "className" => '\Model\User'
        );
    private $m;
    private $dic;
        
    public function __construct($model){
        $this->dic = new \Utils\Dic();
        $this->dic->setLang('pt');
        $this->default['className'] = get_class($model);
        $this->m = $model;
    }
    public function set($value, $name){
        $this->default[$value] = $name;
    }
    public function generate(){
        return "<form class=\"col-md-offset-4 col-md-4\"method='{$this->default['METHOD']}'  role=\"form\">".$this->analizeELements($this->m->params).
        (isset($this->m->values['_id'])?
            "<input type='hidden' value='{$this->m->values['_id']}' name='\\".get_class($this->m)."[id]'/>"
            :
                "").
        "<button type=\"submit\" class=\"btn btn-default\" name=\"\\".get_class($this->m)."[action]\"value=\"".((count($this->m->values) > 0)? 'update' : 'save')."\">".((count($this->m->values) > 0)? 'update' : 'save')."</button></form>";
    }
    private function analizeELements($els){
        $html = "";
        foreach($els as $key => $val){
            if(isset($val['type'])){
                switch($val['type']){
                    case 'text':
                    case 'password':
                    case 'date':
                    case 'number':
                       $html .= $this->input($key,$val['type'],"");
                        break;
                    case 'boolean':
                        $html .= $this->boolean($key,$val['type'],"");
                        break;
                    case 'fk':
                        $html .= $this->fk($key,$val['type'],"");
                        break;
                    case 'longText':
                        $html .= $this->longText($key,$val['type'],"");
                        break;
                    case 'array':
                        $html .= $this->arr($key,$val['elements'],"");
                        break;
                    default:
                        $html .= "tipo ${key} não definido\n";
                }
            }
        }
        return $html;
        
    }
    private function arr($name, $val){
        $html = "";
        
        foreach($val as $key => $v){
            
            $html .= $this->analizeELements($v);
            
        }
        return $html;
    }
    private function input($name,$type,$params){
        return 
          "<div class=\"form-group\">
            <label for=\"{$this->default['className']}\{$name}\">{$this->dic->getWord($name)}</label>
            <input type=\"$type\" class=\"form-control\" name=\"{$this->default['className']}[$name]\" id=\"{$this->default['className']}\[$name]\" ".((isset($this->m->values[$name]))?"value=\"{$this->m->values[$name]}\"":"").">
          </div>";
    }
    private function boolean($name,$type,$params){
        return 
          "<div class=\"form-group\">
                <label>
                  <input type=\"checkbox\" name=\"{$this->default['className']}[$name]\" > {$this->dic->getWord($name)}
                </label>
          </div>";
    }
    private function longText($name,$type,$params){
        return
        "<div class=\"form-group\">
            <label>
                {$this->dic->getWord($name)}
            </label>
            <textarea class=\"form-control\" rows=\"3\" name=\"{$this->default['className']}[$name]\" > </textarea>
          </div>";
    }
    private function fk($name,$type,$params){
        return 
          "<div class=\"form-group\">
            <label for=\"{$this->default['className']}\{$name}\">{$this->dic->getWord($name)}</label>
            <select class=\"form-control\" name=\"{$this->default['className']}[$name]\" id=\"{$this->default['className']}\{$name}\">".
            $this->fk_getList($name)
            ."</select>
          </div>";
    }
    private function fk_getList($name){
        $html = "";
        if(file_exists("{$_SERVER['DOCUMENT_ROOT']}/Nova pasta/DSV-3/cliente/$name.xml")){
            $xml = simplexml_load_file("{$_SERVER['DOCUMENT_ROOT']}/Nova pasta/DSV-3/cliente/$name.xml");
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            $array = $array[$name];
            foreach($array as $val)
            {
            
                $html.= "<option value=\"".$val['@attributes']['_id']."\">".$val['@attributes']['name']."</option>";
            }
        }else {
            $class = "\\Model\\".ucfirst($name);
            echo $class;
            
            $m = new $class();
            
            $array = $m->getAll();
            foreach($array as $val)
            {
            
                $html.= "<option value=\"".$val['_id']."\">".$val['name']."</option>";
            }            
        }
        
        
        return $html;
    }
    public function __destruct(){
        //$this->generate();
    }
}


?>