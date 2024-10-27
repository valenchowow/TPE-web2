<?php
class viewuser{
   private $user = null;
    public function __construct($user) {
        $this->user=$user;
    }
    function mostrarlogin($error=''){
        require 'templates/form.login.phtml';   
        }
}

?>