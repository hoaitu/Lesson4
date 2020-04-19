<!-- //lay du lieu tu form post_edit -->

<?php 




require_once ('../../connection.php');
// $Status = $_POST['checkbox1'] ;;

// type hide : post_edit
$id = $_POST['id'] ;
// die($id);
$Name = $_POST['Name'] ;
$Email = $_POST['Email'] ;
$PassWord = $_POST['PassWord'] ;
// 
	$Status = $_POST['checkbox1'] ; //mặc định
	die($Status);


	// if($Status!= null){

	
	// $Status = 0 ; //mặc định
	
	// if(isset($_POST['checkbox1']))  $Status = $_POST['checkbox1'] ;

	// $query = "UPDATE authors SET stattus = '".$Status."'  WHERE id =".$id ;

	// $status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu
	
// 	if(isset($_POST['checkbox1'])){
// 			// echo $active = $_POST('checkbox1');
// 	}else $Status = $_POST['checkbox1'] ;



// 	$query = "UPDATE authors SET stattus = '".$Status."'  WHERE id =".$id ;

// 	$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu

// }


$query = "UPDATE authors SET name = '".$Name."' , email = '".$Email."' ,password='".$PassWord."' ,stattus =  '".$Status."'  WHERE id =".$id ;
// die($query);

$status = $connection->query($query); //true : neu nhan dk kqua ; false : ko nhan dk du lieu

if($status == true){
	setcookie('msg', 'Cap nhat thanh cong' , time()+5);
	//dua toi dau
	header('Location: author.php');

} else {
	setcookie('msg', 'Cap nhat khong thanh cong' , time()+5);
	//dua toi dau
	header('Location: author_edit.php?id='.$id);

}


?>