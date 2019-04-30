<?php

use Hcode\Model\User;

use Hcode\Model\Category;
use Hcode\Model\Product;

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

		User::verifyLogin();

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

	 $app->get("/admin/categories/:idcategory/products", function($idcategory){

		User::verifyLogin();

		$category = new Category();
		$category->get((int)$idcategory);

		$page = new PageAdmin();
		$page->setTpl("categories-products", [
			'category'=>$category->getValues(),
			'productsRelated'=>$category->getProducts(),
			'productsNotRelated'=>$category->getProducts(false)
		]);
	 });


	 $app->get("/admin/categories/:idcategory/products/:idproduct/add", function($idcategory, $idproduct){

		User::verifyLogin();

		$category = new Category();
		$category->get((int)$idcategory);

		$product = new Product();
		$product->get((int)$idproduct);

		$category->addProduct($product);

		header("Location: /admin/categories/" . $idcategory . "/products");
		exit;
	 });

	 $app->get("/admin/categories/:idcategory/products/:idproduct/remove", function($idcategory, $idproduct){

		User::verifyLogin();

		$category = new Category();
		$category->get((int)$idcategory);

		$product = new Product();
		$product->get((int)$idproduct);

		$category->removeProduct($product);

		header("Location: /admin/categories/" . $idcategory . "/products");
		exit;
	 });

	 