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

// Método que lista todos os usuários em um relatório
    $app->get("/admin/users", function(){
    
        User::verifyLogin();
        $users = User::listAll();
        $page = new PageAdmin();
        $page->setTpl("users", array(
            "users"=>$users
        ));
    });
    // Método que carrega a página para cadastro de usuários
    $app->get("/admin/users/create", function(){
        User::verifyLogin();
        $page = new PageAdmin();
        $page->setTpl("users-create");
    });
    // Método que deleta um usuário a partir do seu id
    $app->get("/admin/users/:iduser/delete", function($iduser){
        User::verifyLogin();
        $user = new User();
        $user->get((int)$iduser);
        $user->delete();
        header("Location: /admin/users");
        exit;
    });
    // Método que pega um usuário especifico pelo seu id e renderiza a página de update do Usuário
    $app->get("/admin/users/:iduser", function($iduser){
        User::verifyLogin();
        $user = new User();
        $user->get((int)$iduser);
        $page = new PageAdmin();
        $page->setTpl("users-update", array(
            
			"user"=>$user->getValues()
			
        ));
    
	});
	
    // Método save save usuário via post (ação do formulário)
    $app->post("/admin/users/create", function(){
        User::verifyLogin();
		$user = new User();
			// Se o valor for definido no banco vai 1 se não vai 0
        $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
        $user->setData($_POST);
        $user->save();
        header("Location: /admin/users");
        exit;
	});
	
    // Método editar usuário via post (ação do formulário)
    $app->post("/admin/users/:iduser", function($iduser){
        User::verifyLogin();
        $user = new User();
        $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
        $user->get((int)$iduser);
        $user->setData($_POST);
        $user->update();
        header("Location: /admin/users");
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

$app->run();

 ?>