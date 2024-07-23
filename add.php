<?php 
	
	include 'config/db_connect.php';

	$email = $title = $ingredients = '';

	$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');
	
		
	if (isset($_POST['submit'])) {
		// echo htmlspecialchars($_POST['email']);
		// echo '<br>';
		// echo htmlspecialchars($_POST['title']);
		// echo '<br>';
		// echo htmlspecialchars($_POST['ingredients']);
		// echo '<br>';
		
		// Email valid
		if (empty($_POST['email'])) {
			$errors['email'] = 'Email Required <br> ';
		} else {
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] =  'Email is not Valid <br>';
			}
		 }


		// Title valid
		if (empty($_POST['title'])) {
			$errors['title'] =  'Title Required <br> ';
		} else {
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-z\s]+$/', $title)){
				$errors['title'] =  'Title must be letters and space only <br>';
			}
		
			
		}

		// ingredients valid
		if (empty($_POST['ingredients'])) {
			$errors['ingredients'] =  'ingredients Required <br> ';
		} else {
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^[a-zA-Z\s]+(,\s?[a-zA-z\s]*)*$/' , $ingredients)){
				$errors['ingredients'] =  'ingredients shoud Seprated by Comma <br>';
			} 

		}

		
		if(!array_filter($errors)){
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			$sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title' , '$email', '$ingredients')";

			if(mysqli_query($conn, $sql)){
				header('Location: index.php');
			} else {
				echo 'Query Error ' . mysqli_error($conn);
			}
		}
	}




?> 

<!DOCTYPE html> 
<html lang="en">

	<?php include ('Templates/header.php'); ?>	

	<section class="container gray-text">
		<h4 class="center">Add a Pizza</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] // action="add.php"?>" method="POST"> 
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<lable>Pizza Title</lable>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>ingredients (comma separated)</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include 'Templates/footer.php'; ?>
</html>