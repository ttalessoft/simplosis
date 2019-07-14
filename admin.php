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