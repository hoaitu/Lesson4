<?php 

require_once ('../../connection.php');
date_default_timezone_set('Asia/Ho_Chi_Minh'); //láy đúng time phải set

	$target_dir = "../../img/";  // thư mục chứa file upload; t.muc luu trữ ảnh
	$thumbnail=""; //để lưu tên của ảnh

	$target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên

	$status =  move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
	 

	if ($status==true) { // nếu upload file không có lỗi 
		
	    $thumbnail = basename( $_FILES["thumbnail"]["name"]); 
	    // láy tên ảnh
	}

$id = $_POST['id'] ;
$title = $_POST['Title'] ;
$description = $_POST['Description'] ;
$content = $_POST['Contents'] ;
// sttus : check ==1 ; ko check == eror 

$statuss= 0; //giá trị mặc định nếu ko check
if(isset($_POST['sttus'])) $statuss = $_POST['sttus'];//láy giá trị mặc định của name : status

$cate_choose = $_POST['choose_cate'];

$creat_time = date('Y-m-d H:i:s');

$query = "INSERT INTO posts (title,desciption,contents,thumbnail,status, category_id, created_at) VALUES ('".$title."', '".$description."' , '".$content."','".$thumbnail."' , '".$statuss."', '".$cate_choose."', '".$creat_time."' ); ";

$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	header('Location: posts.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	header('Location: post_add_description.php?id='.$id);

}


?>
