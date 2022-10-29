<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="./image/favicon.ico">

    <link rel="stylesheet" href="../mainStyle.css">
    <title>Dunyo.uz</title>
</head>

<body>
    <div class="web_size">
        <?php
        require_once "./inc/header.php";
        require_once "./db_methods.php";

        $category = $_GET['category'];
        $news = getNewsByCategory($category);
        ?>

        <div class="main">
            <div class="contanier">
                <?php
                require_once "./inc/wrapperNav.php"
                ?>

                <main class="main-cont">
                    <?php
                    foreach ($news as $newInfo) : ?>
                        <div class="category-blog">
                            <div class="cat-box1">
                                <a id="href" href=""><?= $newInfo['category'] ?></a><br>
                                <a id="cat-text" href="./page/innerPage.php?category=<?= $newInfo['category'] ?>&id=<?= $newInfo['id'] ?>"><?= $newInfo['title'] ?> </a><br>
                                <span id="date">
                                    <?= $newInfo['date']; ?>
                                </span>
                            </div>
                            <div class="box-img">
                                <img id="img-category" src="./admin/img/<?= $newInfo['image'] ?>" alt="">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php
                    require_once "./inc/footer.php";
                    ?>
                </main>
            </div>
        </div>
    </div>
</body>
</html>