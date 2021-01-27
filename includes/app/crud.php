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

        private function conectar() {
            try {
                $this->con = parent::conectar_db();
            } catch (Exception $err) {
                exit($err->getMessage());
            }
        }

        public function criar_noticia() {
        }

        public function ler_todas_noticias() {
            try {
                $stmt = $this->con->query("SELECT * FROM noticia");
                if (!$stmt) throw new mysqli_sql_exception($this->con->connection_error);
                $result = print_r($stmt, true);
                error_log($result, 0);
            } catch (mysqli_sql_exception $err) {
                $this->__destruct();
                error_log($err->getMessage(), 0);
                exit();
            }
        }
    }
?>
