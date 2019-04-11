<?php

use Hcode\PageAdmin;
use Hcode\Model\User;

// Renderiza página admin
$app->get('/admin', function() {
    
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");

});

// Renderiza janela de Login
$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);
	$page->setTpl("login");

});

// Valida login
$app->post('/admin/login', function() {

	User::login(post('deslogin'), post('despassword'));
	header("Location: /admin");
	exit;

});

// Faz logout
$app->get('/admin/logout', function() {

	User::logout();
	header("Location: /admin/login");
	exit;

});

// Renderiza a página de recuperação de senha do Usuário
	$app->get("/admin/forgot", function(){

		$page = new PageAdmin([
			"header"=>false, 
			"footer"=>false
		]);
		$page->setTpl("forgot");
	});

	// Método analisa se o e-mail é válido e existênte via post
	$app->post("/admin/forgot", function(){

		$user = User::getForgot($_POST["email"]);
		header("Location: /admin/forgot/sent");
		exit;

	});

	 // Renderiza a página para edição da nova senha
	 $app->get("/admin/forgot/sent", function(){

		$page = new PageAdmin([
			"header"=>false,
			"footer"=>false
		]);

		$page->setTpl("forgot-sent");
	 });

	 // Rota do e-mail para edição da nova senha
	 $app->get("/admin/forgot/reset", function(){

		$user = User::validForgotDecryt($_GET["code"]);
		$page = new PageAdmin([
			"header"=>false,
			"footer"=>false
		]);

		$page->setTpl("forgot-reset", array(
			"name"=>$user["desperson"],
			"code"=>$_GET["code"]
		));
	 });

	 // Excuta a edição da senha via Post
	 $app->post("/admin/forgot/reset", function(){
		
		$forgot = User::validForgotDecryt($_POST["code"]);
		User::setForgotUsed($forgot["idrecovery"]);
		$user = new User();
		$user->get((int)$forgot["iduser"]);
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
			"cost"=>12
		]);
		$user->setPassword($password);

		$page = new PageAdmin([
			"header"=>false,
			"footer"=>false
		]);

		$page->setTpl("forgot-reset-success", array(
			// Não tem nem uma variável para enviar
		));
		
	 });