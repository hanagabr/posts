<?php
    try{
        $sql = "SELECT * FROM `cars` where `category_id` = ? and id <> ?";
        $stmtRealted = $conn->prepare($sql);
        $stmtRealted->execute([$category_id, $id]);
        
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>

<!-- Related Car Start -->
<div class="container-fluid pb-5">
        <div class="container pb-5">
            <h2 class="mb-4">Related Cars</h2>
            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
            <?php
                foreach($stmtRealted->fetchAll() as $row){
                    $reTitle = $row["title"];
                    $rePrice = $row["price"];
                    $reModel = $row["model"];
                    $reProperties = $row["properties"];
                    $reImage = $row["image"];
                    $auto = $row["auto"];
                    if($auto){
                        $reAuto = "Auto";
                    }else{
                        $reAuto = "Manual";
                    }
            ?>
                <div class="rent-item">
                    <img class="img-fluid mb-4" src="img/<?php echo $reImage ?>" alt="<?php echo $reTitle ?>">
                    <h4 class="text-uppercase mb-4"><?php echo $reTitle ?></h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span><?php echo $reModel ?></span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span><?php echo $reAuto ?></span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span><?php echo $reProperties ?></span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="">$<?php echo $rePrice ?>/Day</a>
                </div>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
    <!-- Related Car End -->