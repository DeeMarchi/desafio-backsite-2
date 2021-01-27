<?php
    namespace TratarInput;

    use LogicException;

    function extrair_tags(&$tags) {
        /* padrão para ignorar víruglas e espaços em branco */
        $regxp = '"[\\s,]"';
        $tags_tratadas = preg_split($regxp, $tags, -1, PREG_SPLIT_NO_EMPTY);
        return $tags_tratadas;
    }

    function tratar() {
        function exibir_tags(&$tags, &$arr_erros) {
            $tags_tratadas = extrair_tags($tags);
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
        exibir_tags($tags, $erros);

        if ($erros) {
            echo "<h2>Ocorreu um erro</h2>";
            array_walk($erros, function($erro) {
                echo "<p>$erro</p>";
                error_log("Erro do lado do cliente: $erro");
            });
            throw new LogicException("Usuário não forneceu dados o suficiente");
        } else
            echo "<h2>nenhum erro ocorreu</h2>";
    }
?>
