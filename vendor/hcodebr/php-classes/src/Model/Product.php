<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Product extends Model{
    
    // Método listar todos
    public static function listAll(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_products ORDER BY desproduct;");
    }

    // Método salvar
    public function save(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlrprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl);", array(
            ":idproduct"=>$this->getidproduct(),
            ":desproduct"=>$this->getdesproduct(),
            ":vlrprice"=>$this->getvlrprice(),
            ":vlwidth"=>$this->getvlwidth(),
            ":vlheight"=>$this->getvlheight(),
            ":vllength"=>$this->getvllength(),
            ":vlweight"=>$this->getvlweight(),
            ":desurl"=>$this->getdesurl()

        ));
        $this->setData($results[0]);
    }

    // Método get() pega um produto do banco
    public function get($idproduct){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_products WHERE idproducts = :idproducts;", array(
            ":idproducts"=>$idproduct
        ));
        $this->setData($results[0]);
    }

    // Método delete() produto
    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", array(
            ":idproduct"=>$this->getidproduct()
        ));
    }
}