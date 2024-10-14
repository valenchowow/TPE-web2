
<?php
class viewinstrumentos{
    function showinstrumentos($instrumentosdb,$marcas){
        include 'templates/showinstrumentos.phtml';
    }
function showdetalle($detalle){
    require 'templates/detalle.phtml';
}
function error(){
    include 'templates/error.phtml';
}
}
?>