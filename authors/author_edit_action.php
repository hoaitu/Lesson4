
<?php 
require_once ('../../connection.php');

$id = $_POST['id'] ;

$Name = $_POST['Name'] ;
$Email = $_POST['Email'] ;
$PassWord = $_POST['PassWord'] ;
// 
	$Status = $_POST['checkbox1'] ; //mặc định
	die($Status);	

$query = "UPDATE authors SET name = '".$Name."' , email = '".$Email."' ,password='".$PassWord."' ,stattus =  '".$Status."'  WHERE id =".$id ;


$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu

if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	
	header('Location: author.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	
	header('Location: author_edit.php?id='.$id);

}


?>