<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display("login");
    }
    public function login(){
        $this->display("login");
    }
    public function register(){
        $this->display("register");
    }
    public function login_handle(){
        if(IS_POST){
            $user_name=I('post.userName','','htmlspecialchars'); 
            $user_pass=I('post.userPass','','htmlspecialchars'); 
            $user_pass=md5($user_pass);
            $filter = array(
                'user_login' => $user_name,
                'user_pass' => $user_pass
                );
            
            $user_info = M('users')->where($filter)->find();
            //var_dump($filter);
            //var_dump($user_info);
            $user = M('users')->select();
            //var_dump($user);
            if($user_info){
                session('user_id',$user_info['id']);
                session('user_name',$user_name);
                //$this->success("哥们，登陆成功..",U("Home/Index/index"));
				 $this->redirect('Home/Index/index');
            }else{
                $this->error('账户或密码错误','login');
            }

        }
    }
    public function register_handle(){
        $model = M('users');
        if(IS_POST){
            $user_name=I('post.userName','','htmlspecialchars'); 
            $user_pass=I('post.userPass','','htmlspecialchars'); 
            $user_passConfrim=I('post.passConfrim','','htmlspecialchars'); 
            $user_captchaCode=I('post.captchaCode','','htmlspecialchars');  
            $num=$model->where("user_login='%s'",array($user_name))->count();
            if($num){
                $this->error("用户名已经有人用啦");
            }
            if($user_pass==$user_passConfrim){
                $user_pass=md5($user_pass);
            }else{
                $this->error("两次输入密码不同","register");
            }
            if($user_captchaCode==session('user_name')){
                $this->error("验证码错啦","register");
            }
            $data['user_login']= $user_name;
            $data['user_pass']= $user_pass;
            $data['user_register']=date('y-m-d H:i:s',time()); 
            $result = $model->data($data)->add();
            if($result){
                $this->success("注册成功","index");
            }else{
                $this->error("注册失败","register");
            }

        }
    }
    public function verify(){
        $Verify = new \Think\Verify(); 
        // 设置验证码字符为纯数字 
        //$Verify->codeSet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $Verify->length = 4;  
        $Verify->imageW =300;
        $Verify->imageH =40;
        $Verify->fontSize =20;
        $Verify->entry();
    }
}