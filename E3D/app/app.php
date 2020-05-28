<?php
namespace app;
require_once "autoload.php";
use Controllers\auth\LoginController as LoginController;

$login = in_array('login', array_keys($_POST));
if($login){
    $datos = \filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $userLogin = new LoginController();
    print_r($userLogin->userAuth($datos));
}
?>