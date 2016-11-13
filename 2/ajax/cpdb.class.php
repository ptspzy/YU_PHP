<?php
    header("Content-Type: text/html; charset=utf-8");//去除中文乱码
    date_default_timezone_set("PRC");//设置中国时区
    require_once('../deal/connect.php');
    /**
    * CPDB类定义
    */
    class CPDB 
    {
        protected $mysqli;

        public function  __construct($dbhost, $dbuser, $dbpass, $dbname, $dbport) {
            $this->mysqli    = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
            if(mysqli_connect_errno()) {
                $this->mysqli    = false;
                echo '<h2>'.mysqli_connect_error().'</h2>';
                die();
            } else {
                $this->mysqli->set_charset("utf8");
            }
        }
        public function searchGlobal($searchKey)
        {
            $KEY="%{$searchKey}%";
            //echo($KEY);
            // $sql="SELECT name FROM cp_urls,cp_terms WHERE (title LIKE ? OR note LIKE ? OR `name` LIKE ?) AND cp_urls.term_id = cp_terms.term_id";
            
            // $mysqli_stmt=$this->mysqli->prepare($sql);        
            // $mysqli_stmt->bind_param('sss',$KEY,$KEY,$KEY);
            
            // if($mysqli_stmt->execute()){
            //     //bind_result():绑定结果集中的值到变量
            //      //$mysqli_stmt->store_result();
            //      //echo mysqli_fetch_array();
            //     $mysqli_stmt->store_result();
            //     //$rows=$mysqli_result->fetch_all();
            //     print_r($mysqli_stmt->fetch_all());
            //     //echo $mysqli_stmt->num_rows;
            //     // $mysqli_stmt->bind_result($ID,$url,$title,$time,$note,$name);
            //     // echo $name;
            //     // while ($mysqli_stmt->fetch()) {
            //     //   echo "Id: {$name}";
            //     // }
            //     //遍历结果集

            $sql="SELECT * FROM cp_urls,cp_terms WHERE (title LIKE '{$KEY}' OR note LIKE '{$KEY}' OR `name` LIKE '{$KEY}') AND cp_urls.term_id = cp_terms.term_id";
            //echo $sql."<br>";
            $mysqli_result=$this->mysqli->query($sql);
            //var_dump($mysqli_result);
            if($mysqli_result && $mysqli_result->num_rows>0){

                while($row = $mysqli_result->fetch_array(MYSQL_ASSOC)) {
                        $myArray[] = $row;
                }
                echo json_encode($myArray,JSON_UNESCAPED_UNICODE);

                //json不含字段
                //$rows=$mysqli_result->fetch_all();
                //print_r($rows);
                //echo json_encode($rows,JSON_UNESCAPED_UNICODE);
            }
        }
        public function get_terms_all()
        {
            $sql="SELECT * FROM cp_terms ORDER BY url_count DESC";
            $mysqli_result=$this->mysqli->query($sql);
            if($mysqli_result&&$mysqli_result->num_rows>0){
                while ($row=$mysqli_result->fetch_array(MYSQL_ASSOC)) {
                    $myArray[]=$row;
                }
            }
            echo json_encode($myArray,JSON_UNESCAPED_UNICODE);
        }
        public function get_urls_by_term($ID)
        {
            $sql="SELECT ID,url,title,time,note,name,count FROM cp_terms,cp_urls WHERE (cp_terms.term_id=cp_urls.term_id) AND cp_urls.term_id={$ID} ORDER BY ID DESC";
            //echo $sql;
            $mysqli_result=$this->mysqli->query($sql);
            if($mysqli_result&&$mysqli_result->num_rows>0){
                while ($row=$mysqli_result->fetch_array(MYSQL_ASSOC)) {
                    $myArray[]=$row;
                } 
            }
            echo json_encode($myArray,JSON_UNESCAPED_UNICODE);
        }
        public function update_count($ID)
        {
            $sql="UPDATE cp_urls SET count=count +1 WHERE ID={$ID}";
            $mysqli_result=$this->mysqli->query($sql);
            echo $mysqli_result;
        }

        public function insert_urls($user,$term,$title,$url,$note)
        {
            $sql="INSERT cp_urls(user_id,term_id,url,title,time,note) VALUES(?,?,?,?,?,?)";
            $mysqli_stmt=$this->mysqli->prepare($sql);
            $time=date('y-m-d h:i:s',time());
            $mysqli_stmt->bind_param('ddssss',$user,$term,$url,$title,$time,$note);
            echo $mysqli_stmt->execute(); 
        }

        public function insert_terms($term)
        {
            $sql="INSERT cp_terms(name,term_time) VALUES(?,?)";
            $mysqli_stmt=$this->mysqli->prepare($sql);
            $time=date('y-m-d H:i:s',time());
            $mysqli_stmt->bind_param('ss',$term,$time);
            echo $mysqli_stmt->execute();        
        }
    }
    // $ocpdb_obj=new CPDB(HOST,USERNAME,PASSWORD,DB,PORT);
    // $ocpdb_obj->searchGlobal('靖');

?>