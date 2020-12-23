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
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../../../favicon.ico">

<title>Vivify Blog</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<!-- Custom styles for this template -->
<link href="../styles/blog.css" rel="stylesheet">
<link href="../styles/styles.css" rel="stylesheet">
</head>
<div class="col-sm-8 blog-main">
    <?php
        $sql = "SELECT * FROM posts WHERE ID = {$_GET['q']}";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $singlePost = $statement->fetch();
    ?>
        <div class="blog-post">
            <a href="#"><h2 class="blog-post-title"><?php echo $singlePost[title]?></h2></a>
            <p class="blog-post-meta"><?php echo $singlePost[created_at]?> by <a href="#"><?php echo $singlePost[author]?></a></p>
            <p><?php echo $singlePost[body]?></p>
            <hr>
        </div>
</div>