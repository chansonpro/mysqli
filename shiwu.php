<?php
	//设置编码格式
	header('content-type:text/html;charset = utf-8');
	//mysqli连接数据库
	$mysqli = new mysqli('localhost','root','','home');
	//判断连接是否正确
	if($mysqli->connect_errno){
		die('ERROR:'.$mysqli->connect_errno.':'.$mysqli->connect_error);
	}
	//设置MySQL字符集编码格式
	$mysqli->set_charset('utf8');
	//关闭MySQL的自动提交功能
	$mysqli->autocommit(FALSE);
	
	//下面是SQL语句
	$sql  = "UPDATE account SET money = money -200 WHERE username = 'Tom'";
	$res = $mysqli->query($sql);
	$res_affected = $mysqli->affected_rows;//查询受影响的记录数
	
	$sql1 = "UPDATE account SET money = money +200 WHERE username = 'Mary'";
	$res1 = $mysqli->query($sql1);
	$res1_affected = $mysqli->affected_rows;//查询受影响的记录数
	//判断
	if($res && $res_affected >0 && $res1 && $res1_affected){
		$mysqli->commit();
		echo "转账成功<br/>";
		$mysqli->autocommit(true);
		
	}else{
		$mysqli->rollback();//事务回滚；
		echo "转账失败<br/>";
		
	}