
<?php
include('dbconnection.php');
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
if(isset($_GET['delid'])) {
	$rid=intval($_GET['delid']);
	$profilepic=$_GET['ppic'];
	$ppicpath="/admin/profilepics"."/".$profilepic;
	$sql=mysqli_query($con,"delete from users where ID=$rid");
	unlink($ppicpath);
	echo "<script>alert('Data deleted');</script>"; 
	echo "<script>window.location.href = 'user-list.php'</script>";     
} 
?>
<?php include 'header.php';?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
					<div class="table-title">
						<div class="row">
							<div class="col-sm-5">
								<h2>User <b>List</b></h2>
							</div>
								<div class="col-sm-7" align="right">
								<a href="/admin/user-insert.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>								
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Profile Pic</th>
								<th>Name</th>                       
								<th>Email</th>
								<th>Username</th>
								<th>Mobile Number</th>
								<th>Created Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$ret=mysqli_query($con,"select * from users");
							$cnt=1;
							$row=mysqli_num_rows($ret);
							if($row>0){
							while ($row=mysqli_fetch_array($ret)) {
							?>
							<!--Fetch the Records -->
							<tr>
								<td><?php echo $cnt;?></td>
								<td><img src="/admin/profilepics/<?php  echo $row['ProfilePic'];?>" width="80" height="80"></td>
								<td><?php echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
								<td><?php echo $row['Username'];?></td>
								<td><?php echo $row['Email'];?></td>                        
								<td><?php echo $row['MobileNumber'];?></td>
								<td><?php echo $row['CreationDate'];?></td>
								<td>
									<a href="/admin/user-read.php?viewid=<?php echo htmlentities ($row['ID']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
									<a href="/admin/user-edit.php?editid=<?php echo htmlentities ($row['ID']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
									<a href="/admin/user-list.php?delid=<?php echo ($row['ID']);?>&&ppic=<?php echo $row['ProfilePic'];?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
								</td>
							</tr>
							<?php $cnt=$cnt+1;} } else {?>
							<tr>
								
							</tr>
									<th style="text-align:center; color:red;" colspan="6">No Record Found</th>
							</tr> 
							<?php } ?>                 
						</tbody>
					</table>
        </div>
    </div>
</div>     

<?php include 'footer.php';?>