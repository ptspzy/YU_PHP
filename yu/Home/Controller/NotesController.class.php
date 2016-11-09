<?php
namespace Home\Controller;
use Think\Controller;
class NotesController extends AuthController {
    public function index(){
        $this->display("add/add_notes");
    }
    //全局搜索
    public function search()
    {
  
        $key=I('s');
        $Notes=M('notes');

        $map['user_id'] = array('eq',session('user_id'));
        $map['note_del'] = array('eq','0');

        $filter['note_content'] = array('LIKE','%'.$key.'%');
        $filter['note_tag'] = array('LIKE','%'.$key.'%');
        $filter['_logic'] = 'or';
        $map['_complex'] = $filter;

        $total = $Notes->where($map)->order('ID desc')->count();
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
        $list_notes=$Notes->where($map)->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //dump($list_notes);
        if($list_notes){
            $this->assign('list_notes', $list_notes);
        }
        $this->display("Index/list_lightnotes");
    
    }
    public function show(){
        $Notes=M('notes');
        
        //分页
        $total = $Notes->where("user_id='%s' and note_del = '%s'",array(session('user_id'),'0'))->order('ID desc')->count();
        if($total){
            $perNum = 4;
            $Page       = new \Think\Page($total,$perNum);

            $Page->setConfig('prev', "上一页");//上一页
            $Page->setConfig('next', '下一页');//下一页
            $Page->setConfig('first', '首页');//第一页
            $Page->setConfig('last', "末页");//最后一页
           $Page -> setConfig ( 'theme', ' <li> %HEADER% </li><li> %FIRST% </li><li> %UP_PAGE% </li><li> %LINK_PAGE% </li><li> %DOWN_PAGE% </li><li> %END%</li>' );

            $show = $Page->show();
            //var_dump($show);
            $this->assign('total',$total);
            $this->assign('page',$show);

        }
        //var_dump($Page);
        $list_notes=$Notes->where("user_id='%s' and note_del = '%s'",array(session('user_id'),'0'))->order('ID desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        if($list_notes){
            $this->assign('list_notes', $list_notes);
        }
        $this->display("Index/list_lightnotes");
    }

    public function add(){
           
        $model=M('notes');
        if( IS_POST ) {
            $note=I('noteValue');
            if($note==""){
                $this->error("不能为空");
            }
            //重复插入验证
            $map['note_content'] = array('eq',$note); 
            $map['user_id'] = array('eq','0'); 
            $num=$model->where($map)->count();
            if($num){
                $this->error("哥们，你已经添加过啦");
            }
            $data['note_content']=$note;  
            $data['user_id'] = $_SESSION['user_id']!=''? $_SESSION['user_id']:'0';
           
            $data['note_time']=date('y-m-d H:i:s',time());  
            $data['note_tag']=I('tagValue'); 
            
            $isopen=I('isopen'); 
            if($isopen=="1"){
                $data['note_open']="1";
            }else{
                $data['note_open']="0";
            }  
            $result = $model->data($data)->add();
            if($result){
                $this->success("轻笔记添加成功..","index");
            }
        }
    }
}