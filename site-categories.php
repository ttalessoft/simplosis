<?php

use Hcode\Page;

use Hcode\Model\Category;

// Renderiza a página de categoria de produtos site
$app->get("/categories/:idcategory", function($idcategory){

		$category = new Category();
		$category->get((int)$idcategory);

		$page = new Page();
		$page->setTpl("category", array(
			'category'=>$category->getValues(),
			'products'=>[]
		));
	 });