<?php

use Hcode\PageAdmin;

use Hcode\Model\User;

// Método que lista todos os usuários em um array
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