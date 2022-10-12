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

    <link rel="stylesheet" href="./mainStyle.css">
    <title>Dunyo.uz</title>
</head>


<body>
    <div class="web_size">
        <?php
        require_once "./inc/header.php";
        require_once "./db_methods.php";

        $newsWorld = getNewsOnWorld();

        
        ?>
        <a>Hello<a/>

        <div class="main">
            <div class="contanier">
                <?php
                require_once "./inc/wrapperNav.php"
                ?>

                <main class="main-cont">
                    <div class="grid-content">
                        <?php foreach ($newsWorld as $world) : ?>
                            <div class="card">
                                <div class="img-content">
                                    <img src="./admin/img/<?= $world['image'] ?>" alt="img"/>
                                </div>
                                <div class="title-content">
                                    <a id="link" href="./page/innerPage.php?category=<?= $world['category'] ?>&id=<?= $world['id'] ?>">
                                        <h4><?= $world['title']; ?></h4>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php
                    require_once "./inc/footer.php";
                    ?>
                </main>
            </div>
        </div>
    </div>
</body>

</html>