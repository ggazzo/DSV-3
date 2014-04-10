<?php
	namespace Utils;
	class Module{
		static function _require($fonte,$path,$class,$name) {
			
			$pt = $path.'/modules/'.str_replace("\\","_",$class).'_'.$name.'.php';
			
			if(!file_exists($pt)){
				if(!is_dir($path.'/modules'))
				    mkdir($path.'/modules',0777,TRUE);	
				$jade = new \Jade\Jade(true);
				file_put_contents($pt, $jade->render($fonte));
			}
			
			return $pt;
		}
	}
?>