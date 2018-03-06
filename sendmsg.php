<?php 
   
    //获取传来的数据
    $user=$_POST["user"];
	$friend=$_POST["friend"];
	$msg=$_POST["msg"];
	$time=$_POST["time"];
	$maxId=$_POST["maxId"];
	// echo $time;
	
	
	
 	//$user='2';
	// $friend='2';
	// $msg='3';
	// $time='2018-02-01';
	// echo $user;
	// echo $time;
   
    $conn=mysql_connect("localhost","root","136426ww");//连接数据库
    if(!$conn){
	die("数据库连接失败".$conn->connect_error);
	}
	mysql_select_db("mychat",$conn);//选择数据库
	//向数据库插入值
	// 自增。
	// $sq1='insert into message (user,msg,time,friend) values("26","大家好，我是26号选手","2010-02-22","我的朋友是小明")';
 	// mysql_query($sq1);
  
 
    //这里遇到的问题：1.post方法传递时，在这个页面无法获取，但是可以回给ajax。
    //2.变量的值要如何去获取。
    //3.id自增，需要把插入语句写完整。
    if($user&&$msg&&$time&$friend){
	$sq="insert into message(user,msg,time,friend) values('{$user}','{$msg}','{$time}','{$friend}')";
	// echo $sq;
	mysql_query($sq);
    // mysql_query("insert into message values('10','2','3','2018-02-01','2')");

    }
     //现在通过时间来读取数据
    $sq=mysql_query("select * from message where id>'{$maxId}'");//查询到数据资源,是名：值 where time<'{$time}'
    $result=array();
   
    while($row=mysql_fetch_assoc($sq)){  
            
            $result[] = $row; //这就是某个key的集合？这里只有name的值。 
            // $result[$row['id']]=$row; 
                 
        }
        // print_r($result);
        // echo $result;
   //遍历数组$result     
//  foreach ($result as $value) {
//   $json .= json_encode($value) . ',';//$value,当前元素
// } 
// echo '['.substr($json,0,strlen($json) - 1) . ']';
       echo json_encode($result);
?>