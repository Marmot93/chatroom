
			<?php
					header("content-type:text/html;charset=utf-8");
					$username=$_POST["username"];
					$pass=$_POST["pass"];
					
					$conn=mysql_connect("localhost","root","136426ww");//链接数据库

					if(!$conn){
						die("连接失败".$conn->connect_error);
					}
					// else{
					// 	echo "连接成功";
					// }
					

					// 选择数据库
					mysql_select_db("mychat",$conn);
					// $insert="INSERT INTO user(id,pass)
					// VALUES
					// ('$username','$pass')";
					// if (!mysql_query($insert,$conn))
					//   {
					//   die('Error: ' . mysql_error());
					//   }
					// echo "1 record added";
					
					$sq=mysql_query("select * from user where id=$username");//查询到数据资源
					if($sq) {
						$row=mysql_fetch_array($sq);
						$id1=$row['id'];//传过来的姓名必须是数字，还没有加验证。
						$pass1=$row['pass'];
						if($id1&&$pass1){
							
							echo "1";
						}
						else{	
							echo "*您的用户名或密码错误";
						}

					}

					//mysql_fetch_array() 函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有
					// if (mysql_num_rows($sq)<1){
					// 			echo '查询无数据！';
					// 				} 这里要写$sq,而不是$rows
					// echo "111".$row['id'];证明是获取到了值
					
					
					
					


					// $sq=mysql_query("SELECT * FROM user");//在数据库查询
					 
					// while($row=mysql_fetch_array($sq))//赋值并判断，之所以错误是因为自己的条件判断写错了。。
  			// 			{
					// 	  echo $row['id'] . " " . $row['pass'];
					// 	  echo "<br />";
					// 	 }

			?>

   