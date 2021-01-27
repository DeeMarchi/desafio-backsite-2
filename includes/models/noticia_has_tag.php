<?php
    class NoticiaHasTag {
        /* tabela associativa muitos para muitos */
        /* Decidir optar relacionar as tags e as notícias 
            desta forma não haveria redundancia de tags
            e também podemos tanto achar uma notícia com uma ou mais tags
            ou também achar várias notícias contendo uma tag ou mais tags inversamente */

        private $noticia_id_noticia;
        private $tag_id_tag;

        function __construct($id_noticia, $id_tag) {
            $this->noticia_id_noticia = $id_noticia;
            $this->tag_id_tag = $id_tag;
        }

        public function get_id_noticia() {
            return $this->noticia_id_noticia;
        }

        public function get_id_tag() {
            return $this->tag_id_tag;
        }
    }
?>
