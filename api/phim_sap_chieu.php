<?php
include_once '../connect/db_connect.php';
$db=new DB_Connect();
$conn=$db->connect();
$domain="raw.githubusercontent.com/cuongnd273/server_movie/master/images/";
$result=mysqli_query($conn,"select * from phim where ngaybatdau > NOW() and isDelete=false");
if($result){
	$phim=array();
	while($row=mysqli_fetch_array($result)){
		$item=array();
		$item['maphim']=$row['maphim'];
		$item['tenphim']=$row['tenphim'];
		$item['ngaybatdau']=$row['ngaybatdau'];
		$item['anh']="http://".$domain.$row['anh'];
		array_push($phim,$item);
	}
	echo json_encode($phim);
}
?>