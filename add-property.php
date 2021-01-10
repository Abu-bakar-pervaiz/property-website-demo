<?php 
include"includes/connect.php";
include"includes/header.php";

if (isset($_POST['submit'])) {
	$property_title=$_POST['property_title'];
	$purpose=$_POST['purpose'];
	$No_of_rooms=$_POST['No_of_rooms'];
	$image_dir="images/".$_FILES['image']['name'];
	$q=mysqli_query($con, "INSERT INTO file(property_title,purpose,	No_of_rooms,image_dir) VALUES('$property_title','$purpose','$No_of_rooms','$image_dir')");
	if ($q) {
		$msg="The Data Submitted Successfully";
		$sts="success";
		move_uploaded_file($_FILES['image']['tmp_name'],$image_dir);
	}
	else{
		$msg="The Data Cannot be Submitted Please Try Again";
		$sts="danger";
	}
}
?>
<div class="container">
	<div class="row mt-5">
		<div class="col-lg-12">
			<h2 class="mb-5">Submit Property</h2>
			<p class="form-headings mb-5">
				<span>01</span> Basic Information
			</p>
		</div>
	</div>
	<div class="row mb-5">
		<div class="col-lg-8 mb-5">
			<?php if (!empty($sts) AND !empty($msg)):?>
				<div class="alert alert-<?=$sts?>"><?=$msg?></div>
			<?php endif ?>
			<form action="" enctype="multipart/form-data" method="post">
				<input type="text" placeholder="Property Title" class="form-control mb-2" name="property_title">
				<input type="text" placeholder="Purpose of Selling" class="form-control mb-2" name="purpose">
				<input type="number" placeholder="No. of Rooms" class="form-control mb-2" name="No_of_rooms">
				<div class="form-group">
					<label for="image">
						<strong>Image of the Property</strong>
					</label>
					<input type="file" class="form-control mb-2" name="image">
				</div>
				<input type="submit" class="btn buttons btn-block" name="submit">
			</form>
		</div>
	</div>
</div>
<?php
include"includes/footer.php";
?>