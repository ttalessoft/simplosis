<?php
use Hcode\Model\User;

use Hcode\Model\State;
use Hcode\Model\City;

use Hcode\PageAdmin;

$app->get("/admin/test", function(){
    $cities = City::listAll();
    print_r($cities);
});

// Renderiza página de lista de Cidades
$app->get("/admin/cities", function(){

    User::verifyLogin();
    
    $cities = City::listAll();
    $page = new PageAdmin();
    
    $page->setTpl("cities", [
        'cities'=>$cities
    ]);

});

// Rendereiza a página de cadastro de cidades
$app->get("/admin/cities/create", function(){

    User::verifyLogin();
    $page = new PageAdmin();
    $page->setTpl("cities-create");

});