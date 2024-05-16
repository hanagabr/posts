<?php

     if(isset($_GET["id"])){
        try{
            include_once("includes/conn.php");
            $id = $_GET["id"];
            $sql = "DELETE FROM `posts` WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            //echo "Deleted Successfully";
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }else{
        echo "Invalid request";
    }


    

    header("Location: postsview.php");
exit; // Make sure to exit to prevent further execution


?>