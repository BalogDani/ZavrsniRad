<?php
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>
<div class="col-sm-8 blog-main">
    <?php
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $singlePost = $statement->fetchAll();
        foreach ($singlePost as $element) { ?>
            <div class="blog-post">
                <a href="#"><h2 class="blog-post-title"><?php echo $element[title]?></h2></a>
                <p class="blog-post-meta"><?php echo $element[created_at]?> by <a href="#"><?php echo $element[author]?></a></p>
                <p><?php echo $element[body]?></p>
                    <hr>
            </div>
            <?php
        }
    ?>

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>
</div>