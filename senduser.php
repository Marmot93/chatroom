<?php
header("content-type:text/html;charset=utf-8");
// $username=$_POST["username"];
// $pass=$_POST["pass"];
					
$conn=mysql_connect("localhost","root","********");//链接数据库

if(!$conn){
	die("数据库连接失败".$conn->connect_error);
	}
					// 选择数据库
mysql_select_db("mychat",$conn);
$sq=mysql_query("select * from userlist");//查询到数据资源,所有name值，所以应该是name：值

//创建一个数组
$result=array();
// var_dump($sq); 

 while($row=mysql_fetch_assoc($sq)){  
            
            $result[] = $row['name'];          
        }
        
   //遍历数组$result     
 foreach ($result as $value) {
  $json .= json_encode($value) . ',';//$value,当前元素
} 
echo '['.substr($json,0,strlen($json) - 1) . ']';


// $row=mysql_fetch_array($sq);
// echo $row['name'][0];//


					


?>