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
        $posts = $statement->fetchAll();
        foreach ($posts as $post) { ?>
            <div class="blog-post">
                <a href="singlepost.php/search?q=<?php echo $post["ID"]?>"><h2 class="blog-post-title"><?php echo $post[title]?></h2></a>
                <p class="blog-post-meta"><?php echo $post[created_at]?> by <a href="#"><?php echo $post[author]?></a></p>
                <p><?php echo $post[body]?></p>
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