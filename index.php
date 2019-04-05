<?php 
session_start();

require_once("vendor/autoload.php");
require_once("functions.php");

use Hcode\Model\User;
use Hcode\Page;
use Hcode\PageAdmin;


$app = new \Slim\Slim();

$app->config('debug', true);

// Renderiza página loja
$app->get('/', function() {
    
	$page = new Page();
	$page->setTpl("index");

});

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

// Renderia página de listagem de usuários
$app->get("/admin/users", function(){
	
	User::verifyLogin();
	$users = User::listAll();
	$page = new PageAdmin();
	$page->setTpl("users", array(
		"users"=>$users
	));

});

// Renderiza página de criação de usuário
$app->get("/admin/users/create", function(){

	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-create");

});

// Executa o comando delete
$app->get("/admin/users/:iduser/delete", function($iduser){
	
	User::verifyLogin();

});

// Renderiza página de edição de usuário
$app->get("/admin/users/:iduser", function($iduser){

	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("users-update");

});

// Executa o salvamento do usuário
$app->post("/admin/users/create", function(){

	User::verifyLogin();
	$user = new User();
	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$user->setData($_POST);
	$user->save();
	header("Location: /admin/users");
	exit;
	
});

// Executa a edição do usuário
$app->post("/admin/users/:iduser", function($iduser){

	User::verifyLogin();

});

// Executa a exclusão do usuário
$app->delete("/admin/users/:iduser", function($iduser){

	User::verifyLogin();

});


$app->run();

 ?>