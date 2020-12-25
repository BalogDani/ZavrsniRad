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
<?php include 'header.php'?>;

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">
            <form name="new post" action="/create_post.php" method="POST">
                <h1>Please create your post below!</h1>
                <p>Title: <input type="text" name="title" placeholder="Cool post" required/></p>
                <p>Body: <input type="text" name="body" placeholder="This is a rainy day, so I can not ride my bycicle..." required/></p>
                <p>Author: <input type="text" name="author" placeholder='W. Shakesbeer' required></p>
                <button>Add post</button>
            </form>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div>

        <?php include 'sidebar.php';?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include 'footer.php';?>

<?php    
    if (!empty($_POST['author'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

        $sqlCreate = "INSERT INTO `posts` (`title`, `body`, `author`) VALUES ('$title', '$body', '$author');";
        $createStatement = $connection->prepare($sqlCreate);
        //print_r($statement);
        $createStatement->execute();
        header('Location: posts.php');
    }
    
?>