<?php

use Hcode\PageAdmin;

    // Método que carrega a página de cadastro de clientes
	$app->get("/admin/clients/create", function(){
		User::verifyLogin();
		$page = new PageAdmin();
		$page->setTpl("client-create");
	});