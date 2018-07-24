<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';

?>
<?php
	$db= new Database();
	$query ="SELECT * FROM tbl_user";
	$read = $db ->select($query);
?>

<?php
	if(isset($_GET['msg'])){
		echo $_GET['msg'] ;
	}
?>

<table class="tblone">
	<tr>
		<th width="10%">Serial</th>
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="25%">Skill</th>
		<th width="15%">Action</th>
	</tr>
	
<?php if($read){?>	
<?php 
	$id = 1;
	while($row = $read ->fetch_assoc()){
?>	

	<tr>
		<td><?php echo 	$id++;?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['skill'];?></td>
		<td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
	</tr>
	
<?php }?>
<?php }?>
</table>

<a href="create.php">CREATE</a>
<?php include 'inc/footer.php'; ?>