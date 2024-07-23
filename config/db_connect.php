<?php 

	$conn = mysqli_connect('localhost', 'mohammad', 'test123', 'opencode_pizza');

	if(!$conn){
	
		echo 'Connection Error ' . mysqli_connect_error();
		
	}

?>
