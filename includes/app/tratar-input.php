<?php
    namespace TratarInput;

    function tratar() {
        function tratar_tags($tags_str, &$arr_erros) {
            /* padrão para ignorar víruglas e espaços em branco */
            $regxp = '"[\\s,]"';
            $tags_tratadas = preg_split($regxp, $tags_str, -1, PREG_SPLIT_NO_EMPTY);
            if (empty($tags_tratadas)) {
                array_push($arr_erros, "Por favor digite pelo menos uma tag!");
            } else {
                echo "<h2>tags</h2>";
                array_walk($tags_tratadas, function($tag) {
                    echo "<p>$tag</p>";
                });
            }
        }
        
        $titulo = $_POST["titulo"];
        $desc = $_POST["descricao"];
        $conteudo = $_POST["conteudo"];
        $tags = $_POST["tags"];
        
        $erros = array();
        if (empty($titulo))
            array_push($erros, "Está faltando o título da notícia!");
        if (empty($desc))
            array_push($erros, "Está faltando a descrição!");
        if (empty($conteudo))
            array_push($erros, "Por favor escreva algum contúdo");
        tratar_tags($tags, $erros);

        if ($erros) {
            echo "<h2>Ocorreu um erro</h2>";
            array_walk($erros, function($erro) {
                echo "<p>$erro</p>";
                error_log("Erro do lado do cliente: $erro");
            });
        } else
            echo "<h2>nenhum erro ocorreu</h2>";
    }
?>
