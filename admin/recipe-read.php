<?php
include('dbconnection.php');
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<?php include 'header.php';?>

<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-5">
            <h2>Recipe <b>Details</b></h2>
          </div>
          <?php
          $vid=$_GET['viewid'];
          $ret=mysqli_query($con,"select * from recipes where ID =$vid");
          $cnt=1;
          while ($row=mysqli_fetch_array($ret)) {
          ?>
            <div class="col-sm-7" align="right">
              <a href="/admin/recipe-edit.php?editid=<?php echo htmlentities ($row['ID']);?>" class="btn btn-primary"><span>Edit Recipe Details</span></a>               
          </div>
        </div>
      </div>
      <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">              
        <tbody>
          <tr>
            <th width="200">Profile Pic</th>
            <td><img src="/admin/recipepics/<?php  echo $row['RecipePhoto'];?>" width="80" height="80"></td>
          </tr>
          <tr>
            <th>Recipe Title</th>
            <td><?php  echo $row['RecipeTitle'];?></td>
            <th>Recipe Day</th>
            <td><?php  echo $row['RecipeDay'];?></td>
          </tr>
          <tr>
            <th>Recipe Time</th>
            <td><?php  echo $row['RecipeTime'];?></td>
            <th>Recipe URL</th>
            <td><?php  echo $row['RecipeUrl'];?></td>
          </tr>
          <tr>
            <th>Recipe Description</th>
            <td><?php  echo $row['RecipeDescription'];?></td>
          </tr>
        <?php 
        $cnt=$cnt+1;
        }?>           
        </tbody>
      </table>
    </div>
  </div>
</div>     

<?php include 'footer.php';?>