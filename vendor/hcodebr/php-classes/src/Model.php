<?php

    namespace Hcode;

    class Model{

        private $values = [];

        // Cria dinamicamente os metodos get's and set's a partir do objeto referenciado
        public function __call($name, $args){

            // identifica pelo nome do atributo se ele é set ou get
            $method = substr($name, 0, 3);

            // identifica pelo nome do atributo o nome do campo no banco/classe
            $fieldName = substr($name, 3, strlen($name));

            switch ($method) {
                
                // condiciona se for um metodo get retorna o valor do campo
                case 'get': 
                    return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL; 
                        break;
                // condiciona se for um método set ele edita/insere o valor a variável        
                case 'set': 
                    $this->values[$fieldName] = $args[0]; 
                        break;
            
            }

        }

        // Seta dados a partir de uma busca no objeto
        public function setData($data = array()){

            foreach ($data as $key => $value) {

                $this->{"set".$key}($value);

            }
        }

        // Pega os dados do usuário que conseguiu fazer o login
        public function getValues(){

            return $this->values;
        }


    }