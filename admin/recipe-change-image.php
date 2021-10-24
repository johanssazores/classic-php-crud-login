<?php 
include('dbconnection.php');

if(isset($_POST['submit'])){
  $uid=$_GET['userid'];
  //getting the post values
  $ppic=$_FILES["recipepics"]["name"];
  $oldppic=$_POST['oldpic'];
  $oldprofilepic="/admin/recipepics"."/".$oldppic;
  // get the image extension
  $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
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
      $query=mysqli_query($con, "update recipes set RecipePhoto='$imgnewfile' where id='$uid' ");
      if ($query) {
        //Old pic
      unlink($oldprofilepic);
      echo "<script>alert('Recipe pic updated successfully');</script>";
      echo "<script type='text/javascript'> document.location ='/admin/recipe-list.php'; </script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
  }
}
?>
<?php include 'header.php';?>

<div class="signup-form">
  <form  method="POST" enctype="multipart/form-data">
    <?php
    $eid=$_GET['userid'];
    $ret=mysqli_query($con,"select * from recipes where ID='$eid'");
    while ($row=mysqli_fetch_array($ret)) {
    ?>
		<h2>Update</h2>
		<p class="hint-text">Update your recipe pic.</p>
    <input type="hidden" name="oldpic" value="<?php  echo $row['RecipePhoto'];?>" />
	  <div class="form-group">
      <img src="/admin/recipepics/<?php  echo $row['RecipePhoto'];?>" width="120" height="120">
		</div>
    <div class="form-group">
      <input type="file" class="form-control" name="recipepics"  required="true">
      <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
    </div>
      <?php }?>
  </form>
</div>

<?php include 'footer.php';?>