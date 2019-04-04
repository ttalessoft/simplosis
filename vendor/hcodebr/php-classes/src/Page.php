<?php
    namespace Hcode;

    use Rain\Tpl;

    class Page {

        private $tpl;
        private $options = [];
        private $defaults = [
            "data"=>[]
        ];

        // Cria o head ao iniciar a instanciação da classe Page
        public function __construct($opts = array()){

            $this->options = array_merge($this->defaults, $opts);

            $config = array(
                "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . "/views/",
                "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
                "debug"         => false
            );
            
            Tpl::configure($config);
            $this->tpl = new Tpl;

            $this->setData($this->options["data"]);

            $this->tpl->draw("header");

        }

        // Povoa um array com os dados da página
        private function setData($data = array()){
            foreach ($data as $key => $value) {
                $this->tpl->assign($key, $value);
            }
        }

        // Carrega o templeate
        public function setTpl($name, $data = array(), $returnHTML = false){
            $this->setData($data);
            return $this->tpl->draw($name, $returnHTML);
        }

        // Cria o footer da página
        public function __destruct(){

            $this->tpl->draw("footer");

        }
    }