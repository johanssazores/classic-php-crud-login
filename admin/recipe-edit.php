<?php 
include('dbconnection.php');
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
if(isset($_POST['submit'])) {
  	$eid=$_GET['editid'];
  	//Getting Post Values
    $recipeTitle=$_POST['recipeTitle'];
    $recipeDay=$_POST['recipeDay'];
    $recipeTime=$_POST['recipeTime'];
    $recipeDescription=$_POST['recipeDescription'];
		$recipeUrl=$_POST['recipeUrl'];

    //Query for data updation
     $query=mysqli_query($con, "update recipes set 
		 RecipeTitle='$recipeTitle',
		 RecipeDay='$recipeDay', 
		 RecipeTime='$recipeTime', 
		 RecipeUrl='$recipeUrl', 
		 RecipeDescription='$recipeDescription'
		 where ID='$eid'
		 ");
     
    if ($query) {
    echo "<script>alert('You have successfully update the recipe');</script>";
    echo "<script type='text/javascript'> document.location ='/admin/recipe-list.php'; </script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
}
?>
<?php include 'header.php';?>

<div class="signup-form">
  <form method="POST">
  <?php
    $eid=$_GET['editid'];
    $ret=mysqli_query($con,"select * from recipes where ID='$eid'");
    while ($row=mysqli_fetch_array($ret)) {
    ?>
    <h2>Update </h2>
    <p class="hint-text">Update your info.</p>

    <div class="form-group">
      <img src="recipepics/<?php  echo $row['RecipePhoto'];?>" width="120" height="120">
      <a href="/admin/recipe-change-image.php?userid=<?php echo $row['ID'];?>">Change Image</a>
    </div>

      <div class="form-group">
        <label>Recipe Title</label>
        <input type="text" class="form-control" name="recipeTitle" value="<?php  echo $row['RecipeTitle'];?>" required="true">
      </div>
      <div class="form-group">
        <label>Recipe Day</label>
          <select class="form-control" name="recipeDay"  required="true">
            <option value="<?php  echo $row['RecipeDay'];?>"><?php  echo $row['RecipeDay'];?></option>
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
        <label>Recipe Time</label>
          <select class="form-control" name="recipeTime"  required="true">
            <option value="<?php  echo $row['RecipeTime'];?>"><?php  echo $row['RecipeTime'];?></option>
						<option value="Breakfast">Breakfast</option>
						<option value="Lunch">Lunch</option>
						<option value="Dinner">Dinner</option>
					</select>
      </div>
      <div class="form-group">
        <label>Recipe URL</label>
        <input type="text" class="form-control" name="recipeUrl" value="<?php  echo $row['RecipeUrl'];?>" required="true">
      </div>
      <div class="form-group">
        <label>Recipe Description</label>
          <textarea class="form-control" name="recipeDescription" required="true"><?php  echo $row['RecipeDescription'];?></textarea>
      </div>   
      <?php } ?>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
      </div>
  </form>
</div>

<?php include 'footer.php';?>