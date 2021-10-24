<?php 
include('admin/dbconnection.php');
?>
<?php include 'header.php';?>

<div class="container">
  <h2 class="recipetop">Recipe's for Wednesday</h2>
  <br>

<h3 class="h3center">Breakfast</h3>
  <div class="row">

  <?php
    $ret=mysqli_query($con,"select * from recipes where RecipeDay='Wednesday' AND RecipeTime='Breakfast' ");
    $cnt=1;
    $row=mysqli_num_rows($ret);
    if($row>0){
    while ($row=mysqli_fetch_array($ret)) {
    ?>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top imagesize" src="/admin/recipepics/<?php  echo $row['RecipePhoto'];?>" />
          <div class="card-body">
            <h5 class="card-title"><?php  echo $row['RecipeTitle'];?></h5>
            <p class="card-text"><?php  echo $row['RecipeDescription'];?></p>
            <a href="<?php  echo $row['RecipeUrl'];?>" class="btn btn-primary" target="_blank">Read On</a>
          </div>
        </div>
      </div>
    <?php $cnt=$cnt+1;} } else { ?>
      <p style="text-align:center;" colspan="6">No Recipe</p>
    <?php } ?>

  </div>
<br>

<h3 class="h3center">Lunch</h3>
<div class="row">

<?php
    $ret=mysqli_query($con,"select * from recipes where RecipeDay='Wednesday' AND RecipeTime='Lunch' ");
    $cnt=1;
    $row=mysqli_num_rows($ret);
    if($row>0){
    while ($row=mysqli_fetch_array($ret)) {
    ?>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top imagesize" src="/admin/recipepics/<?php  echo $row['RecipePhoto'];?>" />
          <div class="card-body">
            <h5 class="card-title"><?php  echo $row['RecipeTitle'];?></h5>
            <p class="card-text"><?php  echo $row['RecipeDescription'];?></p>
            <a href="<?php  echo $row['RecipeUrl'];?>" class="btn btn-primary" target="_blank">Read On</a>
          </div>
        </div>
      </div>
    <?php $cnt=$cnt+1;} } else { ?>
      <p style="text-align:center;" colspan="6">No Recipe</p>
    <?php } ?>

</div>
<br>

<h3 class="h3center">Dinner</h3>
<div class="row">

<?php
    $ret=mysqli_query($con,"select * from recipes where RecipeDay='Wednesday' AND RecipeTime='Dinner' ");
    $cnt=1;
    $row=mysqli_num_rows($ret);
    if($row>0){
    while ($row=mysqli_fetch_array($ret)) {
    ?>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top imagesize" src="/admin/recipepics/<?php  echo $row['RecipePhoto'];?>" />
          <div class="card-body">
            <h5 class="card-title"><?php  echo $row['RecipeTitle'];?></h5>
            <p class="card-text"><?php  echo $row['RecipeDescription'];?></p>
            <a href="<?php  echo $row['RecipeUrl'];?>" class="btn btn-primary" target="_blank">Read On</a>
          </div>
        </div>
      </div>
    <?php $cnt=$cnt+1;} } else { ?>
      <p style="text-align:center;" colspan="6">No Recipe</p>
    <?php } ?>

</div>
<br>


<?php include 'footer.php';?>
