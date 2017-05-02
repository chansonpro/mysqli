<?php 
require_once './connect/connect.php';
require_once './lib/comment.class.php';
$arr = array();
$res = Comment::validate($arr);
if($res){
	$sql ="INSERT INTO comments(username,email,url,content,pubTime,face) VALUES(?,?,?,?,?,?);";
	$mysqli_stmt = $mysqli->prepare($sql);
	$arr['pubTime']=time();
	$mysqli_stmt->bind_param('ssssis',$arr['username'],$arr['email'],$arr['url'],$arr['content'],$arr['pubTime'],$arr['face']);
	$mysqli_stmt->execute();
	$comment = new Comment($arr);
	echo json_encode(array('status'=>1,'html'=>$comment->output()));
	
}else{
	echo '{"status":0,"error:"'.json_encode($arr).'}';
}
