<?php
    class Noticia {
        private $id;
        private $titulo;
        private $descricao;
        private $conteudo;
        private $tags;
        private $slug;
        private $ativo;

        function __construct($titulo, $descricao, $conteudo, &$tags, $id = null) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->conteudo = $conteudo;
            $this->tags = $tags;
            $this->ativo = true;
        }

        public function get_id() {
            return $this->id;
        }

        public function get_titulo() {
            return $this->titulo;
        }

        public function set_titulo($titulo) {
            $this->titulo = $titulo;
        }

        public function get_descricao() {
            return $this->descricao;
        }

        public function set_descricao($descricao) {
            $this->descricao = $descricao;
        }

        public function get_conteudo() {
            return $this->conteudo;
        }

        public function set_conteudo($conteudo) {
            $this->conteudo = $conteudo;
        }

        public function get_tags() {
            return $this->tags;
        }

        public function get_slug() {
            return $this->slug;
        }

        public function set_slug($slug) {
            $this->slug = $slug;
        }

        public function is_ativo() {
            return $this->ativo;
        }

        public function desativar_noticia() {
            $this->ativo = false;
        }
    }
?>
