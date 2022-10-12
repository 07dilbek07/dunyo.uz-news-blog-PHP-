<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
session_start();

$categoryList = Array("world", "money", "culture", "sport");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
</head>

<body>
    <section class="text-center">
        <h3>Добро пожаловать Админ</h3>
    </section>
    <main><br>
        <div class="container d-flex flex-column align-items-center">

            <?php if (isset($_SESSION['success'])) { ?>
                <div class='alert alert-secondary' role='alert'>
                    Данные успешно загружен
                </div>
                                
            <?php } unset($_SESSION['success']);?>

            <form action="./post.php" method="POST" enctype="multipart/form-data" class="w-75">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control " id="title" name="titles" value="<?= $_SESSION['titles'] ?? ""; ?>" placeholder="Введите название новой статьи">
                    <div class="invalid-title">
                        <p class="text-danger"> <?= $_SESSION['err_titles'] ?? ""; ?> </p>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="shortBody" class="form-label">Краткое описание</label>
                    <textarea type="text" class="form-control " rows="2" id="shortBody" name="shortBody" placeholder="Введите краткий текст статьи"><?= $_SESSION['shortBody'] ?? ""; ?></textarea>
                    <div class="invalid-shortBody">
                        <p class="text-danger"> <?= $_SESSION['err_shortBody'] ?? ""; ?> </p>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">Изображение</label>
                    <input type="file" class="form-control 'is-invalid'; ?>" id="image" name="imgfile" placeholder="">
                    <div class="invalid-image">
                        <p class="text-danger"><?= $_SESSION['err_file'] ?? ""; ?> </p>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Oписание</label>
                    <textarea type="text" class="form-control " rows="3" id="body" name="body" placeholder="Введите описание статьи"><?= $_SESSION['body'] ?? ""; ?></textarea>
                    <div class="invalid-body">
                        <p class="text-danger"> <?= $_SESSION['err_bodyDes'] ?? ""; ?> </p>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="categore" class="form-label">Категория</label>
                    <select id="categore" name="categ" class="form-select">
                        <?php
                            foreach($categoryList as $category) {
                                echo("<option value=$category>$category</option>");
                            }
                        ?>
                    </select>
                    <div class="invalid-author">
                        <p class="text-danger"> <?= $_SESSION['err_categ'] ?? "" ?></p>
                    </div> 
                </div>



                <div class="mb-3">
                    <input type="submit" name="submit" value="Submit" class="btn btn-dark w-100">
                </div>
            </form>
    </main>
</body>

</html>