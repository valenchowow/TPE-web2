
<?php
class viewmarcas{
    private $user = null;

    public function __construct($user) {
        
        $this->user=$user;
    }

function listarmarcas($marcas){
require 'templates/showmarcas.phtml';
}
function error(){
    echo "<h1>ERROR 404</h1>";
}
function showitembymarca($items){
    require 'templates/showitempormarca.phtml';
}
}

?>