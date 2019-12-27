<?php
if(!defined('SECURITY')){
	die('Bạn không có quyền truy cập vào file này!');
}
$connect = mysqli_connect('localhost','root','','phpk178');
if($connect){
    mysqli_query($connect, "SET NAMES 'utf8'");
    //print_r('Kết nối thành công!');
}else{
    die('Kết nối thất bại!');
}
?>