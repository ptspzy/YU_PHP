<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller {

    public function index(){
    	$model=M('urls');
      $sql_url="";
		  $sql_url="SELECT * FROM yu_urls WHERE url_open ='1' ORDER BY ID DESC LIMIT 20";
      $list = $model->query($sql_url);
		  $data=json_encode($list,JSON_UNESCAPED_UNICODE);
		  echo $data;
    }

    public function login(){
      $model=M('users');
  		$login = I('login');
  		$pass = I('param.3');

  		echo $login.$pass."ni";

    }

    public function login_out(){
       if(isset($_SESSION['userId'])){
          unset($_SESSION['userId']);
          unset($_SESSION['userName']);
       }else{
          $this->error("还未登录哦","Index/index");
       }
       $this->success("退出成功,我会想你的..","index");
    }

    public function ajax_tag(){
  		if( IS_POST ) {
              $tag = I('tag');
  		}
          if(!isset($_SESSION['userId'])){
              $sql="SELECT * FROM yu_urls WHERE url_tag = '{$tag}'";
          }else{
  			$ID=$_SESSION['userId'];
  			$sql="SELECT * FROM yu_urls WHERE url_tag = '{$tag}' AND user_id='{$ID}'";
  		}
          $model=M('urls');
          $list_tag_click=$model->query($sql);
  		$data=json_encode($list_tag_click,JSON_UNESCAPED_UNICODE);
  		$this->ajaxReturn($data, 'json');
    }
	//ajax 获取轻笔记
	public function ajax_note(){
		 $model=M('notes');
        if(!isset($_SESSION['userId'])){
            $sql="SELECT note_content,note_tag,note_time,user_login FROM yu_notes,yu_users WHERE note_open='1' AND yu_users.ID=yu_notes.user_id ORDER BY yu_notes.ID DESC LIMIT 20";
         }
		 else{
			  $ID=$_SESSION['userId'];
			  $sql="SELECT note_content,note_tag,note_time,user_login FROM yu_notes,yu_users WHERE user_id='{$ID}' AND yu_users.ID=yu_notes.user_id ORDER BY yu_notes.ID DESC LIMIT 20";
		 }

		$list_tag_click=$model->query($sql);
		$data=json_encode($list_tag_click,JSON_UNESCAPED_UNICODE);
		$this->ajaxReturn($data, 'json');

    }
	//ajax 获取所有tag
	public function ajax_left_all_tag(){
        $model=M('urls');

		if(!isset($_SESSION['userId'])){
            $sql="SELECT DISTINCT(url_tag) FROM yu_urls WHERE url_open='1' ORDER BY ID";
        }else{
			$ID=$_SESSION['userId'];
			$sql="SELECT DISTINCT(url_tag) FROM yu_urls WHERE user_id='{$ID}' ORDER BY ID";
		}

		$list_tag_click=$model->query($sql);
		$data=json_encode($list_tag_click,JSON_UNESCAPED_UNICODE);
		$this->ajaxReturn($data, 'json');

    }
    public function search_all(){
        $model=M('urls');
        if( IS_POST ) {
            $key = I('key');

            if(isset($_SESSION['userId'])){
                $ID=$_SESSION['userId'];
                $sql="SELECT * FROM yu_urls WHERE (user_id='{$ID}' OR url_open ='1') AND (url_tag LIKE '%{$key}%' OR url_title LIKE '%{$key}%')";
            }else{
                $sql="SELECT * FROM yu_urls WHERE (url_open ='1') AND (url_tag LIKE '%{$key}%' OR url_title LIKE '%{$key}%')";
            }

            $result=$model->query($sql);
            if(count($result)){
                $data=json_encode($result,JSON_UNESCAPED_UNICODE);
            }else{
                $data="0";
            }
            $this->ajaxReturn($data, 'json');
        } else {
         $this->display();
        }
    }

    public function addUrl(){
        if(!isset($_SESSION['userId'])){
            $this->error("还未登录哦","index");
        }else{
            $this->display(T('add/add'));
        }
        // 检查验证码
        // $verify = I('param.verify','');
        // if(!$this->check_verify($verify)){
        //     $this->error("亲，验证码输错了哦！",$this->site_url,9);
        // }
    }
    public function add_url_deal(){
        if(!isset($_SESSION['userId'])){
            $this->error("还未登录哦","index");
        }

        $model=M('urls');
        if( IS_POST ) {
            $url=I('urlValue');
    
            $ID=$_SESSION['userId'];

            $list = $model->query("SELECT * FROM yu_urls WHERE user_id='{$ID}' AND url_content='{$url}'");
            if(count($list)){
                $this->error("哥们，你已经添加过啦");
            }

            $host_obj=parse_url($url);
            $host=$host_obj['host'];
            $title=$this->returnURLtitle($url);
            $time=date('y-m-d H:i:s',time());
            $tag=I('tagValue');
            $isopen=I('isopen');
            if($isopen=="on"){
                $isopen="1";
            }else{
                $isopen="0";
            }
            //$code=I('identify-code');
            // if(!$this->check_verify($code)){
            //     //return;
            // }

            $sql="INSERT yu_urls(user_id,url_content,url_host,url_title,url_tag,url_open,url_time) VALUES('{$ID}','{$url}','{$host}','{$title}','{$tag}','{$isopen}','{$time}')";
            $list_tag_click=$model->execute($sql);
            if($list_tag_click){
                $this->success("添加成功..","index");
            }
            //echo $sql;

        }

    }
	public function addNote(){
        if(!isset($_SESSION['userId'])){
            $this->error("还未登录哦","index");
        }else{
            $this->display(T('add/addnote'));
        }
    }
    public function add_note_deal(){
        if(!isset($_SESSION['userId'])){
            $this->error("还未登录哦","index");
        }

        $model=M('notes');
        if( IS_POST ) {
            $note=I('noteValue');
            $ID=$_SESSION['userId'];
            $time=date('y-m-d H:i:s',time());
            $tag=I('tagValue');
            $isopen=I('isopen');
            if($isopen=="on"){
                $isopen="1";
            }else{
                $isopen="0";
            }

            $sql="INSERT yu_notes(user_id,note_content,note_tag,note_open,note_time) VALUES('{$ID}','{$note}','{$tag}','{$isopen}','{$time}')";
            $list_tag_click=$model->execute($sql);
            if($list_tag_click){
                $this->success("添加成功..","index");
            }
            //echo $sql;

        }

    }
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 50;
        //$Verify->expire = 600;
        $Verify->entry();
    }

    /**
     * 验证码检查
     */
    function check_verify($code, $id = ""){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    function check_url($url){
        if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
            return false;
        }
    return true;
}
    //获取url的host
    function returnURLtitle($url){

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url,

            //考虑到有些网站是301跳转的.
            CURLOPT_FOLLOWLOCATION => true,
            //连接的超时时间设置为5秒
            CURLOPT_CONNECTTIMEOUT => 5,
            //响应超时时间为5秒
            CURLOPT_TIMEOUT => 5,
            CURLOPT_VERBOSE => false,

            CURLOPT_AUTOREFERER => true,
            //接收所有的编码
            CURLOPT_ENCODING => '',
            //返回页面内容
            CURLOPT_RETURNTRANSFER => true,
        ));

        $response = curl_exec($ch);

        //检测网页的编码,把非UTF-8编码的页面,统一转换为UTF-8处理.
        if ('UTF-8' !== ($encoding = mb_detect_encoding($response, array('UTF-8', 'CP936', 'ASCII')))) {
            $response = mb_convert_encoding($response, 'UTF-8', $encoding);
        }

        //匹配一下title
        $title = '';
        if (preg_match('#<title>(.*)</title>#isU', $response, $match)) {
            $title = $match[1];
        }

        return $title;

    }
}
