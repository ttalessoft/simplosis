<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class CliForGrupo extends Model{

    // Listar todos os Grupos de Clientes/Fornecedores
    public static function listAll(){

        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_cliforgrupo ORDER BY grupo ASC");
        return $results;
    }

    // Método salvar Clientes/Fornecedores
    public function save(){

        $sql = new Sql();
        $results = $sql->select("CALL sp_cliforgrupo_save(:idcliforgru, :grupo);", [
            ':idcliforgru'=>$this->getidcliforgru(),
            ':grupo'=>$this->getgrupo()
        ]);
        $this->setData($results[0]);

    }

    // Pega um Grupo de Clientes/Fornecedores
    public function get($id){

        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_cliforgrupo WHERE idcliforgru = :idcliforgru;", [
            ':idcliforgru'=>$id
        ]);
        $this->setData($results[0]);

    }

    // Deleta um Grupo de Clientes/Fornecedores
    public function delete(){

        $sql = new Sql();
        $sql->select("DELETE FROM tb_cliforgrupo WHERE idcliforgru = :idcliforgru;", [
            ':idcliforgru'=>$this->getidcliforgru()
        ]);

    }

}
