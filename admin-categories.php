<?php

use Hcode\Model\Category;
use Hcode\Model\User;

use Hcode\PageAdmin;

// Renderiza a págigna com todas as categorias
	 $app->get("/admin/categories", function(){

		$categories = Category::listAll();		 
		$page = new PageAdmin();
		$page->setTpl("categories", [
			'categories'=>$categories
		]);

	 });

	 // Renderiza a página de criação de categorias
	 $app->get("/admin/categories/create", function(){

		User::verifyLogin();

		$page = new PageAdmin();
		$page->setTpl("categories-create");

	 });

	 // Salva uma categoria no banco
	 $app->post("/admin/categories/create", function(){

		$category = new Category();
		$category->setData($_POST);
		$category->save();

		header("Location: /admin/categories");
		exit;
	 });

	 // Deleta uma categoria no banco
	 $app->get("/admin/categories/:idcategory/delete", function($idcategory){

		$category = new Category();
		$category->get((int)$idcategory);
		$category->delete();

		header("Location: /admin/categories");
		exit;
	 });

	 // Renderiza a página de edição
	 $app->get("/admin/categories/:idcategory", function($idcategory){

		User::verifyLogin();
		
		$category = new Category();		 
		$category->get((int)$idcategory);

		$page = new PageAdmin();
		$page->setTpl("categories-update", array(
			"category"=>$category->getValues()
		));

	 });

	 // Edita a categoria no banco
	 $app->post("/admin/categories/:idcategory", function($idcategory){

		User::verifyLogin();
		
		$category = new Category();		 
		$category->get((int)$idcategory);
		$category->setData($_POST);
		$category->save();

		header("Location: /admin/categories");
		exit;

	 });