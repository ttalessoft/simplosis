<?php

use Hcode\Model\User;
use Hcode\Model\Uf;
use Hcode\Model\City;

use Hcode\PageAdmin;

    // Método que carrega a página de cadastro de clientes
	$app->get("/admin/clients/create", function(){
		User::verifyLogin();

		$uf = Uf::listAll();

		$page = new PageAdmin();
		$page->setTpl("client-create", array(
			"ufs"=>$uf
		));
	});

	$app->get();

	$app->post("/admin/clients/test", function(){
		User::verifyLogin();
		var_dump($_POST);
		exit;
	});