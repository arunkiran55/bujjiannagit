<?php
$conn = mysqli_connect('localhost','root','','medicalcollege');  
session_start();
$type=$_POST['post_type'];
	if($type=="1"){
        $role = mysqli_real_escape_string($conn,$_POST['role']); 
			if($role==""   ) {
				echo json_encode(array("mandatory"=>"Role is mandatory"));
			}else{
				$record_check = mysqli_query($conn,"select * from roles where role_Title='".$role."'");  
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
				}
				else { 
                    $insert_state=mysqli_query($conn,"insert into roles set role_Title='".$role."', Status='1',createdOn=CURDATE()");         
					if($insert_state == 1){
							echo json_encode(array("success"=>"Record is inserted successfully"));
						}else{
							echo json_encode(array("failed"=>"Record Insertion is Failed"));
						}
				}
		}
    }
	if($type=='2'){
		 $role = mysqli_real_escape_string($conn,$_POST['title']); 
			if($role=="" ) {
				echo json_encode(array("mandatory"=>"Role is mandatory"));
			}else{
				$record_check = mysqli_query($conn,"select * from roles  where role_Title='".$role."'");  
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
                }
				else {
                    
                $id= mysqli_real_escape_string($conn,$_POST['hid']); 
                $insert_state = mysqli_query($conn,"update roles set role_Title='".$role."',updatedOn=CURDATE() where role_Id ='".$id."'");  
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
		$sql = "DELETE FROM `roles` WHERE role_Id='".$id."' ";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("success"=>"Record is Deleted successfully"));
		} 
		else {
			echo json_encode(array("failed"=>"Record is not Deleted"));
		}
		mysqli_close($conn);
	}


   ?>