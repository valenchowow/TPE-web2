
<?php
class viewinstrumentos{
    private $user;
    
    public function __construct($user) {
        $this->user=$user;
    }
    function showinstrumentos($instrumentosdb,$marcas){
        require 'templates/showinstrumentos.phtml';
    }
function showdetalle($detalle){
    require 'templates/detalle.phtml';
}
function error($error=' '){
    require 'templates/error.phtml';
}
}
?>