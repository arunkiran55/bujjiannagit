<?php 

    $conn = mysqli_connect('localhost','root','','medicalcollege'); 
    session_start();

        $id=$_POST['id'];
		$sql = "DELETE FROM `contactus` WHERE id='".$id."' ";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("success"=>"Record is Deleted successfully"));
		} 
		else {
			echo json_encode(array("failed"=>"Record is not Deleted"));
		}
		mysqli_close($conn);

?>