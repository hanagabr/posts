<?php
    include_once("includes/conn.php");
    try{
        $id = $_GET["id"];
        $sql = "SELECT * FROM `posts` where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        
        $result = $stmt->fetch();
        $title = $result["title"];
        $content = $result["content"];

    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
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


<h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >

        </h4>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                <?php echo $title ?>
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                      <?php echo $content?></p>
              </div>
              <div
                class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs"
              >
                <h4 class="mb-4 font-semibold">

              </h4>
                <p>

              </p>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
