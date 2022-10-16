<?php
$conn = mysqli_connect('localhost','root','','medicalcollege'); 
session_start();
$type=$_POST['post_type'];

if($type=="1"){	 
        $feeds_Title = mysqli_real_escape_string($conn,$_POST['title']);
        $feeds_Description = mysqli_real_escape_string($conn,$_POST['description']); 
		$file1 = $_FILES['file_1']['name'];
		$file2 = $_FILES['file_2']['name'];  
		$sess_id = $_SESSION['userid'];
		$imgrename1="";
		$imgrename2=""; 
			if($feeds_Title=="" || $feeds_Description==""  ) {
				echo json_encode(array("mandatory"=>"Title and Description fields are mandatory"));
			}else{
				$record_check = mysqli_query($conn,"select * from feeds where feeds_Title='".$feeds_Title."' and feeds_Description='".$feeds_Description."'"); 
				$record_checks = mysqli_num_rows($record_check);
				
					if($record_checks >= 1){
						echo json_encode(array("exists"=>"Record is already existed"));
					}else { 
						if($_FILES['file_1']['name']!=""){
							$fone = mysqli_real_escape_string($conn,$_FILES['file_1']['name']);
							$imageFileType = pathinfo($fone,PATHINFO_EXTENSION);
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "doc" &&$imageFileType != "docx" && $imageFileType != "pdf") {
								echo "<script>swal('only JPG, JPEG, PNG & GIF files are allowed').then(function() {
									window.location.href='../feedform.php'
								});</script>";
							}else{
								$target_path="../uploads/feedsfiles/";
								$imgrename1 = date('Ymd').rand(1,1000000).'.'.$imageFileType;
            					$image1=move_uploaded_file($_FILES['file_1']['tmp_name'],$target_path.$imgrename1);
								
							}
						}
						if($_FILES['file_2']['name']!=""){
							$ftwo = mysqli_real_escape_string($conn,$_FILES['file_2']['name']);
							$imageFileType = pathinfo($ftwo,PATHINFO_EXTENSION);
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "doc" &&$imageFileType != "docx" && $imageFileType != "pdf" ) {
								echo "<script>swal('only JPG, JPEG, PNG & GIF files are allowed').then(function() {
									window.location.href='../feedform.php'
								});</script>";
							}else{
								$target_path="../uploads/feedsfiles/";
								$imgrename2 = date('Ymd').rand(1,1000000).'two'.'.'.$imageFileType;
            					$image2=move_uploaded_file($_FILES['file_2']['tmp_name'],$target_path.$imgrename2);
							}
						}
						else if(isset($_FILES['file_1']['name'])=="" ){
							 $imgrename1="";
							 $imgrename2="";
						} 
                    $insert_state = mysqli_query($conn,"insert into feeds set feeds_Title	='".$feeds_Title."',feeds_Description='".$feeds_Description."',feeds_File_one='".$imgrename1."',feeds_File_two='".$imgrename2."', feeds_Status='1',feeds_Createddate=CURDATE(),feeds_Createdby='".$sess_id."'");        
					if($insert_state == 1){
							echo json_encode(array("success"=>"Record is inserted successfully"));
						}else{
							echo json_encode(array("failed"=>"Record Insertion is Failed"));
						}
				}
			}
    }


	if($type=='2'){
		$feeds_Title = mysqli_real_escape_string($conn,$_POST['title']);
        $feeds_Description = mysqli_real_escape_string($conn,$_POST['description']); 
		$file1 = $_FILES['file_1']['name'];
		$file2 = $_FILES['file_2']['name'];  
		$sess_id= $_SESSION['userid'];
		$imgrename1="";
		$imgrename2=""; 
		if(!empty($_FILES['file_1']['name'])){
            $accimg = mysqli_real_escape_string($conn,$_FILES['file_1']['name']);
        }else{
            $accimg = mysqli_real_escape_string($conn,$_POST['file1hid']);
        }
		if(!empty($_FILES['file_1']['name'])){
            $accimg2 = mysqli_real_escape_string($conn,$_FILES['file_2']['name']);
        }else{
            $accimg2 = mysqli_real_escape_string($conn,$_POST['file2hid']);
        }  
			if($feeds_Title=="" || $feeds_Description=="") {
				echo json_encode(array("mandatory"=>"Title and Description fields are mandatory"));
			}else{
				$record_check = mysqli_query($conn,"select * from feeds where feeds_Title='".$feeds_Title."' and feeds_Description='".$feeds_Description."' and feeds_File_one='".$accimg."'"); 
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
                }
				else {
                    if($_FILES['file_1']['name']!=""){
							$fone = mysqli_real_escape_string($conn,$_FILES['file_1']['name']);
							$imageFileType = pathinfo($fone,PATHINFO_EXTENSION);
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc"&& $imageFileType != "doc" &&$imageFileType != "docx" && $imageFileType != "pdf" ) {
								echo "<script>swal('only JPG, JPEG, PNG & GIF files are allowed').then(function() {
									window.location.href='../feedform.php'
								});</script>";
							}else{
								$target_path="../uploads/feedsfiles/";
								$imgrename1 = date('Ymd').rand(1,1000000).'.'.$imageFileType;
            					$image1=move_uploaded_file($_FILES['file_1']['tmp_name'],$target_path.$imgrename1);
								
							}
						}else{
						$image1 = mysqli_real_escape_string($conn,$_POST['file1hid']);
						$imgrename1=$image1;
					   }
						if($_FILES['file_2']['name']!=""){
							$ftwo = mysqli_real_escape_string($conn,$_FILES['file_2']['name']);
							$imageFileType = pathinfo($ftwo,PATHINFO_EXTENSION);
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "doc" &&$imageFileType != "docx" && $imageFileType != "pdf" ) {
								echo "<script>swal('only JPG, JPEG, PNG & GIF files are allowed').then(function() {
									window.location.href='../feedform.php'
								});</script>";
							}else{
								$target_path="../uploads/feedsfiles/";
								$imgrename2 = date('Ymd').rand(1,1000000).'two'.'.'.$imageFileType;
            					$image2=move_uploaded_file($_FILES['file_2']['tmp_name'],$target_path.$imgrename2);
							}
						}
						else{
						$image2 = mysqli_real_escape_string($conn,$_POST['file2hid']);
						$imgrename2=$image2;
					   } 
					}if(isset($_FILES['file_1']['name'])=="" && isset($_FILES['file_2']['name'])==""){
							 $imgrename1="";
							 $imgrename2="";
						} 
						$id= mysqli_real_escape_string($conn,$_POST['hid']); 
                    $insert_state = mysqli_query($conn,"update feeds set feeds_Title='".$feeds_Title."',feeds_Description='".$feeds_Description."',feeds_File_one='".$imgrename1."',feeds_File_two='".$imgrename2."',feeds_Updateddate=CURDATE(),feeds_Createdby='".$sess_id."' where feeds_Id='".$id."'");  
 
					if($insert_state == 1){
							echo json_encode(array("success"=>"Record is updated successfully"));
						}else{
							echo json_encode(array("failed"=>"Record updation is Failed"));
						}
		}
	}

	
	if($type=='3'){
		$id=$_POST['id'];
		$sql = "DELETE FROM `feeds` WHERE feeds_Id='".$id."' ";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("success"=>"Record is Deleted successfully"));
		} 
		else {
			echo json_encode(array("failed"=>"Record is not Deleted"));
		}
		mysqli_close($conn);
	}


   ?>