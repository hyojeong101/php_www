<?php 
//선언 -> 생성-> 호출
//데이터 베이스 선언
class Database
{
    public $connect; 
    
    //복합개체 - 객체지향의 은닉화(숨겨놓고 꺼내먹는거)
    //public,private,protected
    private $Table;
    public function setTable($name){
        $this->Table = $name;
        return $this;
    }
    public function getTable(){
        return $this->Table;
    }


    //생성자 메소드(함수)
    public function __construct($config)
    {
           //테이블 객체 연결
           $this->Table = new Table($this);
        echo "클래스 생성";
        $this->connect = new mysqli($config['host'], $config['user'], $config['passwd'],$config['database']);
        if(!$this->connect ->connect_errno){
            echo "DB 접속 성공이에요";
        }else{
            echo"접속이 안돼요";
        }
    }
    public function queryExecute($query)
    {
        if($result = mysqli_query($this->connect,$query)){
            echo " query성공";
        }else {
            print "query 실패";
        }
        return $result;

    }
    //테이블 확인
    public function isTable($tablename)
    {
    $query = "SHOW TABLES";
    $result = $this->queryExecute($query);

    $count = mysqli_num_rows($result);

    for($i=0;$i<$count;$i++){
        $row = mysqli_fetch_object($result);
        if($row->Tables_in_php == $tablename){
            return true;
            }
        
        }
        return false;

    }
}