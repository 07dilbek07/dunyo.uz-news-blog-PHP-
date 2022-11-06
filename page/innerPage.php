<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <link rel="stylesheet" href="../mainStyle.css">
    <title>Dunyo.uz</title>
</head>

<body>
    <div class="web_size">
        <?php
        require_once "../inc/header.php";
        require_once "../db_methods.php";

        $category = $_GET['category'];
        $id = $_GET['id'];
        $articlePage = new NewsDbBasePDO();
        $article = $articlePage->getCategoryAndIdArticle($category , $id);
        $article = $article[0];
        ?>
        <div class="main">
            <div class="contanier">
                <?php
                    require_once "../inc/wrapperNav.php";
                ?>

                <main class="main-cont">
                    
                    <section class="section">
                        <div class="date d-flex">
                            <span style="font-size: 12px ;"> <?= $article['date']?> </span>
                        </div>
                        <h2 class="text-center mb-2"> <?= $article['title'] ?> <br></h2>

                        <h4 class="mb-3 fs-5"> <?= $article['shortDescription']?> <br> </h4>
                        <div class="img-blok my-4">
                            <img class="w-100 img-fluid" src="/admin/img/<?= $article['image']?>" alt="img"><br>
                        </div>
                        
                        <h4 class="page_text"><?= $article['description']?> <br> </h4>
                    </section>
                    <?php
                    require_once("../inc/footer.php");
                    ?>
                </main>
            </div>
        </div>
    </div>
</body>

</html>