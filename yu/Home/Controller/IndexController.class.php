<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index(){
    	$Urls=M('urls');
        $USERID = session('user_id');
        //分页
        $total = $Urls->where("user_id='{$USERID}'")->order('ID desc')->count();
        if($total){
            $perNum = 6;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
            $Page -> setConfig ( 'theme', ' <li> %HEADER% </li> %FIRST% <li> %UP_PAGE% </li><li> %LINK_PAGE% </li><li> %DOWN_PAGE% </li> %END%' );

            $show = $Page->show();
            //var_dump($show);
            $this->assign('total',$total);
            $this->assign('page',$show);

        }
        
        $list_urls=$Urls->where("user_id='{$USERID}'")->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        if($list_urls){
            $this->assign('list_urls', $list_urls);
        }
		$this->display();
    }
    public function urls(){
        $Urls=M('urls');

        //分页
        $total = $Urls->where('url_open=1')->order('ID desc')->count();
        if($total){
            $perNum = 6;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
            $Page -> setConfig ( 'theme', ' <li> %HEADER% </li> %FIRST% <li> %UP_PAGE% </li><li> %LINK_PAGE% </li><li> %DOWN_PAGE% </li> %END%' );
            // foreach($filter as $key=>$val) {
            //     $Page->parameter[$key]   =   urlencode($val);
            // }

            $show = $Page->show();
            //var_dump($show);
            $this->assign('total',$total);
            $this->assign('page',$show);

        }
        //var_dump($Page);
        $list_urls=$Urls->where('url_open=1')->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        if($list_urls){
            $this->assign('list_urls', $list_urls);
        }
        $this->display("list_urls");
    }
    public function notes(){
        $Notes=M('notes');
        //分页
        $total = $Notes->where('')->order('ID desc')->count();
        if($total){
            $perNum = 6;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
            $Page -> setConfig ( 'theme', ' <li> %HEADER% </li> %FIRST% <li> %UP_PAGE% </li><li> %LINK_PAGE% </li><li> %DOWN_PAGE% </li> %END%' );
            // foreach($filter as $key=>$val) {
            //     $Page->parameter[$key]   =   urlencode($val);
            // }

            $show = $Page->show();
            //var_dump($show);
            $this->assign('total',$total);
            $this->assign('page',$show);

        }
        //var_dump($Page);
        $list_notes=$Notes->where('')->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        if($list_notes){
            $this->assign('list_notes', $list_notes);
        }
        $this->display("list_lightnotes");
    }
    public function tags(){
        $Urls=M('urls');
        $list_tags=$Urls->where('url_open=1')->distinct(true)->field('url_tag')->order('ID desc')->select();
        if($list_tags){
            $this->assign('list_tags', $list_tags);
        }
        $this->display("list_tags");
    }
    public function open_urls(){
        $Urls=M('urls');
        $list_urls=$Urls->where("url_open=1 and url_del= '0'")->order('ID desc')->limit(10)->select();
        if($list_urls){
            $this->assign('list_urls', $list_urls);
        }
        $this->display("open_urls");
    }
    public function open_notes(){
        $Notes=M('notes');
        $list_notes=$Notes->where("note_open=1 and note_del = '0'")->order('ID desc')->limit(10)->select();
        if($list_notes){
            $this->assign('list_notes', $list_notes);
        }
        $this->display("open_lightnotes");
    }


    public function login(){
        $model=M('users');
        if( IS_POST ) {
            $username=I('username');
            $userpass=I('userpass');  
			$userpass=md5($userpass);
            $sql="SELECT * FROM yu_users WHERE user_login='{$username}' AND user_pass='{$userpass}'"; 
            $result=$model->query($sql);
            //echo $sql;
            if(count($result)){
                $_SESSION['userName'] = $username;
                $_SESSION['userId'] = $result[0]["id"];
                // dump($result);
                // echo($result[0]["id"]);
                //unset($_SESSION['name']);
                $this->success("哥们11，登陆成功..","index");
            }else{ 
                $this->success("哥们，账户或密码错误，再试试..","index");
            }
        }
        
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

        if( IS_POST ) {
            $key = I('key');
            if(substr($key,0,2)=="--" ){
                $key = substr($key,2);
                $this->redirect('Home/Notes/search',array('s' => $key));
            }else {
                $this->redirect('Home/Urls/search',array('s' => $key));
            }

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
    }
    /**
        添加url
    */
    public function add_url_deal(){
        if(!isset($_SESSION['userId'])){
            $this->error("还未登录哦","index");
        }
           
        $model=M('urls');
        if( IS_POST ) {
            $url=I('urlValue');
            //echo $url;
            // if(!$this->check_url($url)){
            //     echo "string";
            //    return;
            // }
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
        // if(!isset($_SESSION['userId'])){
        //     $this->error("还未登录哦","index");
        // }
           
        $model=M('notes');
        if( IS_POST ) {
            $note=I('noteValue');
            $ID=$_SESSION['userId'];
            $time=date('y-m-d H:i:s',time());  
            $tag=I('tagValue'); 
            $isopen=I('isopen'); 
            var_dump($isopen);
            // if($isopen=="on"){
            //     $isopen="1";
            // }else{
            //     $isopen="0";
            // }  
     
            // $sql="INSERT yu_notes(user_id,note_content,note_tag,note_open,note_time) VALUES('{$ID}','{$note}','{$tag}','{$isopen}','{$time}')"; 
            // $list_tag_click=$model->execute($sql);
            // if($list_tag_click){
            //     $this->success("添加成功..","index");
            // }
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