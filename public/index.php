<?php
    require "../includes/app/tratar-input.php";
    require "../includes/models/noticia.php";
    require "../includes/models/tag.php";
    require "../includes/models/noticia_has_tag.php";
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
                        try {
                            TratarInput\tratar();
                            $CRUD = new CRUD;
    
                            $tags = TratarInput\extrair_tags($_POST["tags"]);
                            $noticia = new Noticia($_POST["titulo"],
                                                    $_POST["descricao"],
                                                    $_POST["conteudo"],
                                                    $tags);
                            $CRUD->criar_noticia($noticia);
                        } catch (LogicException $err) {
                            error_log($err->getMessage());
                        }
                    }
                ?>
            </main>
        </div>
    </body>
</html>
