<?php

include_once("includes/conn.php");

$status = false;

if(isset($_GET["id"])){
    $id = $_GET["id"];
	$status = true;
}elseif($_SERVER["REQUEST_METHOD"] ==="POST"){
	$status = true;
			// read inputs
			$id = $_POST["id"];
			$title = $_POST["title"];
			$content = $_POST["content"];
			// update data 
			$sql = "UPDATE `posts` SET `title`=?,`content`=? WHERE id =?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$title, $content, $id]);
			echo "updated Successfully";
		}	
	
	//if($status){
		// show data for the car on the form
		try{
			// get data for the required post
			$sql = "SELECT * FROM `posts` WHERE id = ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$id]);
			$row = $stmt->fetch();
			$title = $row["title"];
			$content = $row["content"];
			
		}

	catch(PDOException $e){
		echo "Can't get car data: " . $e->getMessage();
	}

  
  ?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>edit post</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
  <?php include_once("includes/nav.php"); ?>
  <?php
		if($status){
	?>

  <div class="container">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
				<h3 class="my-4">edit post</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label"> Title</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title"  value="<?php echo $title ?>" required ></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required><?php echo $content ?></textarea></div>
				</div> 
      </div>
	  <?php
								}
							?>

				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">edit</button></div>
				</div>
			</form>
		</div>
		
	</body>

</html>