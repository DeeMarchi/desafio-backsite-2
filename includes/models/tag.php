<?php
    class Tag {
        private $id;
        private $tag;

        function __construct($tag, $id = null) {
            $this->tag = $tag;
            $this->id = $id;
        }

        public function get_id() {
            return $this->id;
        }

        public function get_tag() {
            return $this->tag;
        }
    }
?>
