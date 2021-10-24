<?php 
include('dbconnection.php');
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if(isset($_POST['submit'])) {
  	//getting the post values
    $recipeTitle=$_POST['recipeTitle'];
    $recipeDay=$_POST['recipeDay'];
    $recipeTime=$_POST['recipeTime'];
    $recipeDescription=$_POST['recipeDescription'];
		$recipeUrl=$_POST['recipeUrl'];
   	$recipepics=$_FILES["recipepics"]["name"];
		// get the image extension
		$extension = substr($recipepics,strlen($recipepics)-4,strlen($recipepics));
		// allowed extensions
		$allowed_extensions = array(".jpg","jpeg",".png",".gif");
		// Validation for allowed extensions .in_array() function searches an array for a specific value.
		if(!in_array($extension,$allowed_extensions)) {
		echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
		} else {
		//rename the image file
		$imgnewfile=md5($imgfile).time().$extension;
		// Code for move image into directory
		move_uploaded_file($_FILES["recipepics"]["tmp_name"],"recipepics/".$imgnewfile);
		// Query for data insertion
		$query=mysqli_query($con, "insert into recipes(
			RecipeTitle,
			RecipeDay, 
			RecipeTime, 
			RecipeDescription, 
			RecipeUrl, 
			RecipePhoto) 
			value(
				'$recipeTitle',
				'$recipeDay', 
				'$recipeTime', 
				'$recipeDescription', 
				'$recipeUrl', 
				'$imgnewfile'
				)");
			if ($query) {
			echo "<script>alert('You have successfully added the recipe');</script>";
			echo "<script type='text/javascript'> document.location ='/admin/recipe-list.php'; </script>";
			} else {
			echo "<script>alert('Something Went Wrong. Please try again');</script>";
			}
		}
}
?>

<?php include 'header.php';?>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data" >
		<h2>Add Recipe</h2>
		<p class="hint-text">Fill out the form</p>
        <div class="form-group">
					<label>Recipe Title</label>
					<input type="text" class="form-control" name="recipeTitle" required="true">
        </div>
        <div class="form-group">
					<label>Day</label>
					<select class="form-control" name="recipeDay"  required="true">
						<option value="Monday">Monday</option>
						<option value="Tuesday">Tuesday</option>
						<option value="Wednesday">Wednesday</option>
						<option value="Thursday">Thursday</option>
						<option value="Friday">Friday</option>
						<option value="Saturday">Saturday</option>
						<option value="Sunday">Sunday</option>
					</select>
        </div>
				<div class="form-group">
					<label>Time</label>
					<select class="form-control"name="recipeTime"  required="true">
						<option value="Breakfast">Breakfast</option>
						<option value="Lunch">Lunch</option>
						<option value="Dinner">Dinner</option>
					</select>
        </div>
        <div class="form-group">
					<label>Description</label>
        	<textarea class="form-control" name="recipeDescription"  required="true"></textarea>
        </div>
				<div class="form-group">
					<label>Recipe URL</label>
        	<input type="text" class="form-control" name="recipeUrl" required="true">
        </div> 
				<div class="form-group">
        	<input type="file" class="form-control" name="recipepics"  required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>      
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
        </div>
				<div class="text-center"><a href="recipe-list.php">Back</a></div>
    </form>
</div>

<?php include 'footer.php';?>