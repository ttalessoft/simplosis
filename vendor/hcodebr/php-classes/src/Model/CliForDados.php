<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class CliForDados extends Model{

    // Listar todos os Clientes/Fornecedores
    public static function listAll(){

        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_clifordados ORDER BY idclifor ASC");
        return $results;

    }

    // Método salvar Clientes/Fornecedores
    public function save(){

        $sql = new Sql();
        $results = $sql->select("CALL sp_clifordados_save(:idclifor, :tipo_pe, :tipo_cf, :nome_rs, :apel_nome_f, :cpf_cnpj, :rg_ie, :nasc_abert, :responsavel, :celular, :telefone, :email, :grupo, :cep, :logradouro, :numero, :bairro, :uf, :cidade, :obs)", [
            ':idclifor'=>$this->getidclifor(),
            ':tipo_pe'=>$this->gettipo_pe(),
            ':tipo_cf'=>$this->gettipo_cf(),
            ':nome_rs'=>$this->getnome_rs(),
            ':apel_nome_f'=>$this->getapel_nome_f(),
            ':cpf_cnpj'=>$this->getcpf_cnpj(),
            ':rg_ie'=>$this->getrg_ie(),
            ':nasc_abert'=>$this->getnasc_abert(),
            ':responsavel'=>$this->getresponsavel(),
            ':celular'=>$this->getcelular(),
            ':telefone'=>$this->gettelefone(),
            ':email'=>$this->getemail(),
            ':grupo'=>$this->getgrupo(),
            ':cep'=>$this->getcep(),
            ':logradouro'=>$this->getlogradouro(),
            ':numero'=>$this->getnumero(),
            ':bairro'=>$this->getbairro(),
            ':uf'=>$this->getuf(),
            ':cidade'=>$this->getcidade(),
            ':obs'=>$this->getobs()
        ]);
        $this->setData($results[0]);
    }

    // Pega um Cliente/Fornecedor a partir do $id
    public function get($id){

        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_clifordados WHERE idclifor = :idclifor;", [
            ':idclifor'=>$this->getidclifor()
        ]);
        $this->setData($results[0]);

    }

    // Deleta um Cliente/Fornecedor
    public function delete(){

        $sql = new Sql();
        $sql->select("DELETE FROM tb_clifordados WHERE idclifor = :idclifor;", [
            ':idclifor'=>$this->getidclifor()
        ]);
    }
}