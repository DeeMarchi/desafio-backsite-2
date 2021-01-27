<?php
    abstract class Conexao {
        private static $mysql_config = [
            "host" => "127.0.0.1",
            "user" => "root",
            "password" => "",
            "database" => "crud_noticia",
        ];

        protected function conectar_db() {
            try {
                /* pege a referência da configuração pois não é necessário copia-las a cada chamada */
                $config = &Conexao::$mysql_config;
                $con = new mysqli($config["host"],
                                    $config["user"],
                                    $config["password"],
                                    $config["database"]);
                error_log("Conexão ao db sucedida!", 0);
                return $con;
            } catch (mysqli_sql_exception $err) {
                throw $err;
            } catch (Exception $err) {
                throw $err;
            }
        }
    }
?>
