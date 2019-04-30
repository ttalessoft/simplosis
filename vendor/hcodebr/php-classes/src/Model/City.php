<?php
namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class City extends Model{

    // Método lista todas as cidades
    public static function listAll(){
        $sql = new Sql();

        $results = $sql->select("SELECT a.idcity, a.name as city, b.state as state, c.initials as country FROM tb_cities a
                                INNER JOIN tb_states b on a.idstate = b.idstate
                                INNER JOIN tb_countries c on c.idcountry = b.idcountry
                                ORDER BY a.name ASC;");
        return $results;
        
    }

    // Método salvar
    public function save(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_cities_save(:idcity, :name, :idstate);", [
            ':idcity'=>$this->getidcity(),
            ':name'=>$this->getname(),
            ':idstate'=>$this->getidstate()
        ]);
        $this->setData($results[0]);
    }

    // Pega uma cidade
    public function get($idcity){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_cities WHERE idcity = :idcity;", [
            ':idcity'=>$idcity
        ]);
        $this->setData($results[0]);
    }

    // Deleta uma Cidade
    public function delete(){
        $sql = new Sql();
        $sql->select("DELETE FROM tb_cities WHERE idcity = :idcity;", [
            ':idcity'=>$this->getidcity()
        ]);
    }
}