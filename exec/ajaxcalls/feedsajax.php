<?php
$conn = mysqli_connect('localhost','root','','medicalcollege');
// print_r($_POST);exit;
$type=$_POST['post_type'];

if($type=="1"){	 
        $feeds_Title = mysqli_real_escape_string($conn,$_POST['title']);
        $feeds_Description = mysqli_real_escape_string($conn,$_POST['description']); 
		$file1 = $_FILES['file_1']['name'];
		$file2 = $_FILES['file_2']['name'];  
		// echo $file1;exit;
		$imgrename1="";
		$imgrename2="";
		// echo $feeds_Title;echo $feeds_Description;exit;
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
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "jpeg" ) {
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
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "jpeg" ) {
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
                    $insert_state = mysqli_query($conn,"insert into feeds set feeds_Title	='".$feeds_Title."',feeds_Description='".$feeds_Description."',feeds_File_one='".$imgrename1."',feeds_File_two='".$imgrename2."', feeds_Status='1',feeds_Createddate=CURDATE()");        
					if($insert_state == 1){
							echo json_encode(array("success"=>"Record is inserted successfully"));
						}else{
							echo json_encode(array("failed"=>"Record Insertion is Failed"));
						}
				}
			}
    }
	if($type=='2'){
		$bedctgry = mysqli_real_escape_string($conn,$_POST['bedctgry']);
        $dscrptn = mysqli_real_escape_string($conn,$_POST['dscrptn']);   
			if($bedctgry=="" || $dscrptn==""  ) {
				echo json_encode(array("mandatory"=>"All fields are mandatory"));
			}else{
				$record_check = mysqli_query($conn,"select * from tbl_bedcategory where bedcategory_name='".$bedctgry."' and bedcategory_description='".$dscrptn."'");  
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
                }
				else {
                    
                $id= mysqli_real_escape_string($conn,$_POST['hid']); 
                    $insert_state = mysqli_query($conn,"update tbl_bedcategory set bedcategory_name='".$bedctgry."',bedcategory_description='".$dscrptn."' where bedcategory_id='".$id."'");  
					if($insert_state == 1){
							echo json_encode(array("success"=>"Record is updated successfully"));
						}else{
							echo json_encode(array("failed"=>"Record updation is Failed"));
						}
				}
		}
	}

	
	if($type=='3'){
		$id=$_POST['id'];
		$sql = "DELETE FROM `tbl_bedcategory` WHERE bedcategory_id='".$id."' ";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("success"=>"Record is Deleted successfully"));
		} 
		else {
			echo json_encode(array("failed"=>"Record is not Deleted"));
		}
		mysqli_close($conn);
	}


   ?>