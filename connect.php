<?php
	header ('content-type:text/html;charset = utf-8');
	$mysqli = new mysqli('localhost','root','','phpComment');
	if($mysqli->errno){
		die('Connect error:'.$mysqli->error);
	}else{
		$mysqli->set_charset('utf8');
	}