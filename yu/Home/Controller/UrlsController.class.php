<?php
namespace Home\Controller;
use Think\Controller;
class UrlsController extends AuthController {
    public function index(){
        $this->display("add/add_urls");
    }
    //全局搜索
    public function search()
    {
         
        $key=I('s');
        $Urls=M('urls');
        $map['user_id'] = array('eq',session('user_id'));
        $map['url_del'] = array('eq','0');
        $filter['url_content'] = array('LIKE','%'.$key.'%');
        $filter['url_tag'] = array('LIKE','%'.$key.'%');
        $filter['_logic'] = 'or';
        $map['_complex'] = $filter;
        $total = $Urls->where($map)->order('ID desc')->count();
        if($total){
            $perNum = 6;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
           $Page -> setConfig ( 'theme', ' <li> %HEADER% </li><li> %FIRST% </li><li> %UP_PAGE% </li><li> %LINK_PAGE% </li><li> %DOWN_PAGE% </li><li> %END%</li>' );
            $show = $Page->show();
          
            $this->assign('total',$total);
            $this->assign('page',$show);

        }
        //var_dump($Page);
        $list_urls=$Urls->where($map)->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //dump($list_urls);
        if($list_urls){
            $this->assign('list_urls', $list_urls);
        }
        $this->display("Index/index");
   
    }
    public function show(){
        $Urls=M('urls');
        //分页
        $total = $Urls->where("user_id='%s' and url_del = '%s'",array(session('user_id'),'0'))->order('ID desc')->count();
        if($total){
            $perNum = 6;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
            $Page -> setConfig ( 'theme', ' <li> %HEADER% </li> %FIRST% <li> %UP_PAGE% </li><li> %LINK_PAGE% </li><li> %DOWN_PAGE% </li> %END%' );

            $show = $Page->show();
          
            $this->assign('total',$total);
            $this->assign('page',$show);

        }
        //var_dump($Page);
        $list_urls=$Urls->where("user_id='%s' and url_del='%s'",array(session('user_id'),'0'))->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        if($list_urls){
            $this->assign('list_urls', $list_urls);
        }
        $this->display("Index/list_urls");
    }
    public function add(){
           
        $model=M('urls');
        if( IS_POST ) {
            $url=I('urlValue');
            $title=$this->returnURLtitle($url);
            $map['url_content'] = array('eq',$url); 
            $map['user_id'] = array('eq','0'); 
            $num=$model->where($map)->count();
            if($num){
                $this->error("哥们，你已经添加过啦");
            }
            $data['url_content'] = $url != '' ? $url : false;
            $data['user_id'] = $_SESSION['user_id']!=''? $_SESSION['user_id']:'0';
            $host_obj=parse_url($url);  
            $data['url_host']=$host_obj['host']!=''?$host_obj['host']:'未能获取到域名';  
            $data['url_title']=$title != '' ? $title : "暂无标题";
            $data['url_time']=date('y-m-d H:i:s',time());  
            $data['url_tag']=I('tagValue'); 
            $isopen=I('isopen'); 
            if($isopen=="1"){
                $data['url_open']="1";
            }else{
                $data['url_open']="0";
            }  
            $result = $model->data($data)->add();
            if($result){
                $this->success("添加成功..","index");
            }
        }
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