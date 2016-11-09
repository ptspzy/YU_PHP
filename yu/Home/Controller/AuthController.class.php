<?php
namespace Home\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function _initialize(){
        $user_name = session('user_name');
        if(!$user_name){
            $this->redirect('Home/User/login');
        }
    }
}