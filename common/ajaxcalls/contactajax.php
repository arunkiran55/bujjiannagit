<?php
$conn = mysqli_connect('localhost','root','','medicalcollege');  
session_start();
$name = mysqli_real_escape_string($conn,$_POST['name']); 
$mail = mysqli_real_escape_string($conn,$_POST['mail']);
$phnum = mysqli_real_escape_string($conn,$_POST['phnum']);
$message = mysqli_real_escape_string($conn,$_POST['message']);
			if($phnum=="" && $mail==""  ) {
				echo json_encode(array("mandatory"=>"mail is mandatory"));
			}else{
				$record_check = mysqli_query($conn,"select * from contactus  where name='".$name."' and email='".$mail."' and contact='".$phnum."'");  
				$record_checks = mysqli_num_rows($record_check);
				if($record_checks >= 1)
				{
					echo json_encode(array("exists"=>"Record is already existed"));
				}
				else { 
                    $insert_state=mysqli_query($conn,"insert into contactus set name='".$name."',email='".$mail."',contact='".$phnum."',message='".$message."',createdon=CURDATE()");         
					if($insert_state == 1){
							echo json_encode(array("success"=>"Record is inserted successfully"));
						}else{
							echo json_encode(array("failed"=>"Record Insertion is Failed"));
						}
				}
		}

?>