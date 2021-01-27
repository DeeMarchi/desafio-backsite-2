<?php
    class CRUD extends Conexao {
        private $con;
        
        function __construct() {
            $this->conectar();
        }
        
        function __destruct() {
            /* desconectar do DB ao perder a referência ao obj CRUD */
            error_log("Encerrando a conexão ao db", 0);
            mysqli_close($this->con);
        }

        private function saida_forcada($err) {
            $this->__destruct();
            error_log($err->getMessage(), 0);
            exit();
        }

        private function conectar() {
            try {
                $this->con = parent::conectar_db();
            } catch (Exception $err) {
                exit($err->getMessage());
            }
        }

        public function criar_noticia(&$noticia) {
            error_log("Criando notícia", 0);

            error_log("Informações noticias", 0);
            error_log($noticia->get_descricao(), 0);
            error_log($noticia->get_conteudo(), 0);
            $tags = print_r($noticia->get_tags(), true);
            error_log($tags, 0);

            try {
                $stmt = $this->con->prepare("INSERT INTO noticia VALUES(?, ?, ?, ?, ?, ?)");
                // (id, titulo, slug, descricao, conteudo, ativo)
                $stmt->bind_param("issssi", $id, $titulo, $slug, $descricao, $conteudo, $ativo);
                if (!$stmt) throw new mysqli_sql_exception($this->con->error);

                $noticia->set_slug("provisorio");
                $id = null;
                $titulo = $noticia->get_titulo();
                $titulo = $this->con->real_escape_string($titulo);
                $slug = $noticia->get_slug();
                $descricao = $noticia->get_descricao();
                $descricao = $this->con->real_escape_string($descricao);
                $conteudo = $noticia->get_conteudo();
                $conteudo = $this->con->real_escape_string($conteudo);
                $ativo = intval($noticia->is_ativo());

                $stmt->execute();
            } catch (mysqli_sql_exception $err) {
                $this->saida_forcada($err);
            }
        }
        
        public function ler_todas_noticias() {
            try {
                $stmt = $this->con->query("SELECT * FROM noticia");
                if (!$stmt) throw new mysqli_sql_exception($this->con->error);
                $result = print_r($stmt, true);
                error_log($result, 0);
            } catch (mysqli_sql_exception $err) {
                $this->saida_forcada($err);
            }
        }
    }
?>
