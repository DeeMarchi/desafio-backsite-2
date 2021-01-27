<?php
    require "../includes/app/tratar-input.php";
    require "../includes/app/connexao.php";
    require "../includes/app/crud.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "../includes/views/head.php"; ?>
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="center-container p-2">
            <header>
                <h1>Crud notícias</h1>
            </header>
            <main>
            <?php require "../includes/views/form-noticia.php"; ?>

                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            TratarInput\tratar();
                        }
                        $CRUD = new CRUD;

                        $CRUD->ler_todas_noticias();

                ?>
            </main>
        </div>
    </body>
</html>
