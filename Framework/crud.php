<?php

class ModelGenercic {
    public $values = array();
    public $params;
    public $collection = "user";
    public function set($index , $value) {
        $this->values[$index] = $value;
    }
    public function validate(){
        foreach($this->params as $key => $val){
            foreach($val as $k => $v){
                if($v=="notnull"){
                    if(!$this->values[$key]){
                        echo "o campo {$key} é obrigatório";
                        return false;
                    }
                    
                }
            }
            
            
        }
        return true;
    }
    public function getAll(){
        $a = database::getCollection($this->collection);
        return $a->find();
    }
    public function save(){
        //salva 


        if($this->validate()){
                    $a = MongoConnect("ggazzo",'321456','DSV_3','widmore.mongohq.com:10000',$this->collection);
        
            $a->insert($this->values);
            echo "salvei {$this->values[name]}";
        }
    }
    
    
}  




class User extends ModelGenercic{
    public $collection = "user";
    public $params = array("name"=>array("notnull",'text'),'pass'=>array("notnull"),"RG","sexo"=>array("notnull"));
}    
class Medicamento extends ModelGenercic{
    public $collection = "Medicamento";
    public $params = array("name"=>array("notnull",'text'));
}    
    
$user = new Medicamento();



?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="_css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container" ng-app="myApp">
    
 <?php   
    
    if($_POST['name']){


    $user->set('name',$_POST['name']);
    
        ?><div class="alert alert-success"><?php
        $user->save();
        ?></div><?php
    
    
    
}
?>

<form role="form" method="POST" ng-controller="Medicamentos">
<h3>AngularJS GitHub Issues</h3>
<table class="table table-striped">
  <tr>
    <th>Number</th>
    <th>State</th>
    <th>Reporter</th>
    <th>Title</th>
    <th>Description</th>
  </tr>
  <tr ng-repeat="issue in data.issues">
    <td>{{issue.number}}</td>
    <td>{{issue.state}}</td>
    <td>{{issue.user.login}}</td>
    <td>{{issue.title}}</td>
    <td>{{issue.body}}</td>
  </tr>
</table>
  <div class="form-group">
    <label for="exampleInputEmail1">Nome</label>
    <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Nome">
    
  </div>
  <button type="submit" class="btn btn-default">Save</button>
</form>
      <?php
      
      echo"<ul  class=\"list-group\">";
            foreach($user->getAll() as $value){
                echo "<li class=\"list-group-item\">".$value['name']."</li>";
                
            }
            echo"</ul>";
      ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="_js/angular.min.js"></script>
    <script type="text/javascript" src="_js/controller.js"></script>
  </body>
</html>