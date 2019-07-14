<?php

use Hcode\Model\User;

use Hcode\PageAdmin;

    // Método que carrega a página de cadastro de clientes
	$app->get("/admin/clients/create", function(){
		User::verifyLogin();
		$page = new PageAdmin();
		$page->setTpl("client-create");
	});

	$app->post("/admin/clients/test", function(){
		User::verifyLogin();
		var_dump($_POST);
		exit;
	});