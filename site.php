<?php

use Hcode\Page;

use Hcode\Model\Category;

// Renderiza página loja
$app->get('/', function() {
    
	$page = new Page();
	$page->setTpl("index");

});