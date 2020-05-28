<?php
namespace Controllers\auth;
use Models\user;

class LoginController{
    public $sv;
    public $name;
    public function __construct(){
        $this->sv = false;
    }

    public function userAuth($datos){
        $user = new user;
        $result = $user->where([['email', $datos['email']],['passwd', sha1($datos['passwd'])]])->get();
        if(\sizeof(\json_decode($result)) > 0) return $this->sessionRegister($datos);
        else {
            //$this->sessionDestroy();
            echo json_encode((["r"=>false]));
        }
    }

    function sessionRegister($datos){
        session_start();
        $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['email'] = $datos['email'];
        $_SESSION['PASSWD'] = sha1($datos['PASSWD']);
        session_write_close();
        return \json_encode(["r"=>true]);
    }
}
?>