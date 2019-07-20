<?php
    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;

    class Uf extends Model{

        // Lista todos os Estados
        public static function listAll(){
            
            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_states ORDER BY name;");

        }

        // Busca um Estado pelo id do mesmo
        public function get($idstate){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM tb_states WHERE idstate = :idstate", [
                ':idstate'=>$idstate
            ]);
            $this->setData($results[0]);
        }

        // Retorna todas as cidades relacionadas aquele estado
        public function getCities($idstate){

            $sql = new Sql();
            return $sql->select("SELECT * FROM tb_states a
                                    INNER JOIN tb_cities b ON a.idstate = b.idstate
                                    WHERE a.idstate = :idstate;", [
                                        ':idstate'=>$idstate
                                    ]);
            
        }

        


    }