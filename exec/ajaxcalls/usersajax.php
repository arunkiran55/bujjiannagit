<?php
$conn = mysqli_connect('localhost','root','','medicalcollege'); 
$type=$_POST['post_type'];
	if($type=="1"){
        $fname = mysqli_real_escape_string($conn,$_POST['name']);
        $mail = mysqli_real_escape_string($conn,$_POST['email']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $role= mysqli_real_escape_string($conn,$_POST['role']);
        $accimage = $_FILES['file']['name'];
        $imageFileType = pathinfo($accimage,PATHINFO_EXTENSION);
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg"  && $_FILES["file"]["name"] ) {
				echo json_encode(array("format"=>" only JPG, JPEG, PNG   files are allowed"));
			}else{
				$record_check = mysqli_query($conn,"select * from users where contact='".$phone."'");
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
				}
				else {
					$targeting="../uploads/users/";
					$imgrename = date('Ymd').rand(1,10000).'.'.$imageFileType;
					$image1=move_uploaded_file($_FILES['file']['tmp_name'],$targeting.$imgrename);
					$insert_state = mysqli_query($conn,"insert into users set name='".$fname."',email='".$mail."',password='".$pwd."',role='".$role."',contact='".$phone."',image='".$imgrename."',status='1',createdon= CURDATE()");
				if($insert_state == 1)
					{
						echo json_encode(array("success"=>"Record in inserted successfully"));
					}
				else
				{
						echo json_encode(array("failed"=>"Record Insertion is Failed"));
				}
				}
		}
	}

	if($type==2){
		$fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $mail = mysqli_real_escape_string($conn,$_POST['mail']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
        $phone = mysqli_real_escape_string($conn,$_POST['phone']);
        $adrs= mysqli_real_escape_string($conn,$_POST['adrs']);  
		$id= mysqli_real_escape_string($conn,$_POST['eid']);
        $accimg = $_FILES['accimg']['name'];
        $imageFileType = pathinfo($accimg,PATHINFO_EXTENSION);
		if(!empty($_FILES['accimg']['name'])){
            $accimg = mysqli_real_escape_string($conn,$_FILES['accimg']['name']);
        }else{
            $accimg = mysqli_real_escape_string($conn,$_POST['accimghid']);
        }
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $_FILES["accimg"]["name"] ) {
				echo json_encode(array("format"=>" only JPG, JPEG, PNG & GIF files are allowed"));
			}else{
				$record_check = mysqli_query($conn,"select * from tbl_accountant where accountant_name='".$fname."' and accountant_contact='".$phone."' and accountant_image='".$accimg."'");
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
				}
				else {
					$imgrename ="";
					if(!empty($_FILES['accimg']['name'])){
						$accimg = mysqli_real_escape_string($conn,$_FILES['accimg']['name']);
						$targeting="../uploads/laboratoristimages/";
						$imgrename = date('Ymd').rand(1,1000000).'.'.$imageFileType;
						$image1=move_uploaded_file($_FILES['accimg']['tmp_name'],$targeting.$imgrename);
					}else{
						$accimg = mysqli_real_escape_string($conn,$_POST['accimghid']);
						$imgrename=$accimg;
					} 
					$insert_state = mysqli_query($conn,"update tbl_accountant set accountant_name='".$fname."',accountant_email='".$mail."',accountant_password='".$pwd."',accountant_address='".$adrs."',accountant_contact='".$phone."',accountant_image='".$imgrename."' where accountant_id  ='".$id."'");
				if($insert_state == 1)
					{
						echo json_encode(array("success"=>"Record is updated successfully"));
					}
				else
				{
						echo json_encode(array("failed"=>"Record updation is Failed"));
				}
				}
		}
	}

	
	if($type=="3"){
		$id=$_POST['id'];
		$sql = "DELETE FROM users WHERE user_Id='".$id."'";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("success"=>"Record is Deleted successfully"));
		} 
		else {
			echo json_encode(array("failed"=>"Record is not Deleted"));
		}
		mysqli_close($conn);
	}


   ?>