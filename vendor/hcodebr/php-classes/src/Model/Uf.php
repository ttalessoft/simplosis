<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Uf extends Model{

    // Método listar todos
    public static function listAll(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_states ORDER BY state ASC");
    }
}